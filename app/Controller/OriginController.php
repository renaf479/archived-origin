<?php

class OriginController extends AppController {
	public $helpers 	= array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth', 'Minify.Minify');
	public $components 	= array('Session', 'RequestHandler', 'Usermgmt.UserAuth');
	public $uses		= array('OriginAd', 
								'OriginComponent',
								'OriginDemo',
								'OriginSite',
								'OriginTemplate',
								'OriginAdSchedule', 
								'OriginAdDesktopInitialContent', 
								'OriginAdDesktopTriggeredContent',
								'OriginAdTabetInitialContent', 
								'OriginAdTabletTriggeredContent',
								'OriginAdMobileInitialContent', 
								'OriginAdMobileTriggeredContent',
								'Usermgmt.User',
								'Usermgmt.UserGroup', 
								'Usermgmt.LoginToken');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->User->userAuth = $this->UserAuth;
	}
	
/* =======================================================================
	General
========================================================================== */	
/*
	public function index() {
		$this->set('title_for_layout', 'Dashboard');
	}
*/
	/**
	* 
	*/
/*
	public function templateEdit($id) {
		
	}
*/
/* =======================================================================
	Ad Rendering
========================================================================== */
	/**
	* Displays the ad
	* Permissions: All
	*/
	public function ad($originAd_state = '') {
		$this->layout 	= 'ad';
		
		$originAd_id		= $this->request->params['originAd_id'];
		$originAd_platform	= $this->request->params['originAd_platform'];
		//$originAd_state		= $originAd_state;
		
		$origin_ad		= $this->OriginAd->find('first', 
			array(
				'conditions'=>array(
					'OriginAd.id'=>$originAd_id
				),
				'contain' => array(
					'OriginAdSchedule'=>array(
						'OriginAd'.$originAd_platform.'InitialContent',
						'OriginAd'.$originAd_platform.'TriggeredContent'
					)
				)
			)
		);
		
		//If content doesn't exist, fallback to Desktop version
		if(sizeof($origin_ad['OriginAdSchedule'][0]['OriginAd'.$originAd_platform.'InitialContent']) === 0) {
			$originAd_platform	= 'Desktop';
			$origin_ad		= $this->OriginAd->find('first', 
				array(
					'conditions'=>array(
						'OriginAd.id'=>$originAd_id
					),
					'contain' => array(
						'OriginAdSchedule'=>array(
							'OriginAd'.$originAd_platform.'InitialContent',
							'OriginAd'.$originAd_platform.'TriggeredContent'
						)
					)
				)
			);
		}
		
		$this->set('origin_ad', $origin_ad);
		$this->set('originAd_platform', $originAd_platform);
		$this->set('originAd_state', $originAd_state);
		$this->set('title_for_layout', $origin_ad['OriginAd']['name']);	
	}
	
	/**
	* Displays the embed content wrapped inside an iframe
	* Permissions: All
	*/
	public function adIframe() {
		$this->layout	= 'adIframe';
		///adIframe/:originAd_model/:originAd_contentId
		$originAd_model		= $this->request->params['originAd_model'];
		$originAd_contentId	= $this->request->params['originAd_contentId'];
		
		$origin_ad		= $this->{$originAd_model}->find('first', 
			array(
				'conditions'=>array(
					$originAd_model.'.id'=>$originAd_contentId
				),
				'recursive'=>-1
			)
		);
		$origin_ad 		= json_decode($origin_ad[$originAd_model]['content']);
		
		$this->set('origin_ad', $origin_ad);
	}
	
/* =======================================================================
	Ad Creator
========================================================================== */
	/**
	* Updates the ad's 'modified' fields
	*/
	private function _adModifyUpdate($originAd_id) {
		$data['id']				= $originAd_id;
		$data['modify_by']		= $this->UserAuth->getUserId();
		$data['modify_date']	= date('Y-m-d H:i:s');
		$this->OriginAd->save($data);
	}
	
	/**
	* Loads the current ad unit in JSON format
	*/
	private function _creatorAdLoad($data) {
		$this->layout	= 'ajax';
		$this->jsonAdUnit($data['originAd_id']);
		return $this->render('/Origin/json/json_ad_unit');
	}
	
	/**
	* Creates a new Origin ad unit
	*/
	private function creatorAdCreate($data) {
		$tempContent			= $data['content'];
		$data['content']		= json_encode($data['content']);
		$data['config']			= json_encode($data['config']);
		$data['create_by']		= $this->UserAuth->getUserId();
		$data['modify_by']		= $this->UserAuth->getUserId();
		$data['modify_date']	= date('Y-m-d H:i:s');
		
		if($this->OriginAd->save($data)) {
			$schedule['origin_ad_id']	= $this->OriginAd->id;
			$this->OriginAdSchedule->save($schedule);
			$assets		= '../webroot/assets/creator/'.$this->OriginAd->id;
			if(!is_dir($assets)) {
				mkdir($assets, 0777, true);
			}
			
			//Move optional temporary image into new location			
			if(isset($tempContent['img_thumbnail']) && $tempContent['img_thumbnail'] !== '') {
				$newLocation 	= '/assets/creator/'.$this->OriginAd->id.'/'.basename($tempContent['img_thumbnail']);
			
				rename('../webroot'.$tempContent['img_thumbnail'], '../webroot'.$newLocation);
				
				$updateData['id']						= $this->OriginAd->id;
				$updateData['content']['img_thumbnail']	= $newLocation;
				$updateData['content']['ga_id']			= $tempContent['ga_id'];
				$updateData['content']					= json_encode($updateData['content']);
				
				$this->OriginAd->save($updateData);
			}
			echo $this->OriginAd->id;
		}
	}
	
	/**
	* Deletes an Origin ad unit
	*/
	private function creatorAdDelete($data) {
		if($this->OriginAd->delete($data['id'], true)) {
			//Remove folder
			$this->_removeFolder('../webroot/assets/creator/'.$data['id']);
		
			//Remove associated demo pages
			$this->OriginDemo->deleteAll(
				array(
					'OriginDemo.origin_ad_id'=>$data['id']
				),
			false);
			
			$this->layout	= 'ajax';
			$this->jsonList();
			return $this->render('/Origin/json/json_list');
		}
	}
	
	/**
	* Opens Origin's ad creator
	* Permissions: Developers and Designers
	*/
	public function creatorAdEdit() {
		$origin_ad		= $this->OriginAd->find('first', 
			array(
				'recursive'=>-1,
				'conditions'=>array(
					'OriginAd.id'=>$this->request->params['originAd_id']
				)
			)
		);
		$this->set('origin_ad', $origin_ad);
		$this->set('title_for_layout', $origin_ad['OriginAd']['name'].' - Ad Creator');
		$this->render('creator/ad_edit');
	}
	
	/**
	* Displays a listing of all Origin ad units
	* Permissions: Logged in
	*/
	public function creatorAdList() {
		$this->set('title_for_layout', 'Origin Ads');
		$this->render('creator/ad_list');
	}
	
	/**
	* Toggle an ad unit's showcase status
	*/
	private function creatorAdShowcase($data) {
		$showcase['id']			= $data['id'];
		$showcase['showcase']	= $data['showcase'];
	
		if($this->OriginAd->save($showcase)) {
			$this->layout	= 'ajax';
			$this->jsonList();
			return $this->render('/Origin/json/json_list');
		}
	}
	
	/**
	* Save CSS
	*/
	private function cssUpdate($data) {
		$css['id'] = $css['originAd_id'] = $data['id'];
		$css['content_css']	= $data['content'];
	
		if($this->OriginAd->save($css)) {
			$this->_adModifyUpdate($css['originAd_id']);
			
			return $this->_creatorAdLoad($css);
		}
	}

	/**
	* Removes the content from the ad unit
	*/
	private function creatorContentRemove($data) {
		if($this->{'OriginAd'.$data['model'].'Content'}->delete($data['id'])) {
			//$this->creatorWorkspaceUpdate($data);
			return $this->_creatorAdLoad($data);	
		}
	}

	/**
	* Creates an Origin ad unit's content record
	*/
	private function creatorContentSave($data) {
		//Save workspace updates first...
		$this->creatorWorkspaceUpdate($data);
		
		if(!isset($data['id'])) {
			$order	= $this->{'OriginAd'.$data['model'].'Content'}->find('first',
				array(
					'conditions'=>array('OriginAd'.$data['model'].'Content.origin_ad_schedule_id'=>$data['origin_ad_schedule_id']),
					'fields'=>array('MAX(`order`) as `order`')
				)
			);
			//$order	= (int)$order[0]['order'] + 1;
			$data['order']			= (int)$order[0]['order'] + 1;
		}
		
		$embedIframe			= isset($data['content']['iframe'])? true: false;
		$data['origin_ad_id']	= $data['originAd_id'];
		$data['content']		= json_encode($data['content']);
		$data['config']			= json_encode($data['config']);
		
		if($this->{'OriginAd'.$data['model'].'Content'}->save($data)) {
			
			if($embedIframe) {
				/**
				* Special case for iframe-able embed content
				*/
				$updateData['id']		= $this->{'OriginAd'.$data['model'].'Content'}->id;
				$updateData['render'] 	= str_replace(array('%model%', '%id%'), array('OriginAd'.$data['model'].'Content', $updateData['id']), $data['render']);
				$this->{'OriginAd'.$data['model'].'Content'}->save($updateData);
			}
			
			return $this->_creatorAdLoad($data);
		}
	}
	
	/**
	* Updates the order of all content layers
	*/
	private function creatorLayerUpdate($data) {
		if($this->{'OriginAd'.$data['model'].'Content'}->saveAll($data['data'])) {
			return $this->_creatorAdLoad($data);	
		}
		$this->_adModifyUpdate($data['originAd_id']);
	}
	
	/**
	* Save settings
	*/
	private function creatorSettingsUpdate($data) {
		unset($data['statusSwitch']);
		
		$data['config']			= json_encode($data['config']);
		$data['content']		= json_encode($data['content']);
		$data['modify_date']	= date('Y-m-d H:i:s');
		$data['modify_by']		= $this->UserAuth->getUserId();
		$data['status']			= empty($data['status'])? 0: 1;
		$data['originAd_id']	= $data['id'];		
		if($this->OriginAd->save($data)) {
			return $this->_creatorAdLoad($data);
		}
	}
	
	/**
	* User action to save a workspace's content items (size and position)
	*/
	private function creatorWorkspaceUpdate($data) {
		//Array of relevant models
		$modelArray		= array('OriginAdDesktopInitialContent', 
								'OriginAdDesktopTriggeredContent',
								'OriginAdTabletInitialContent', 
								'OriginAdTabletTriggeredContent',
								'OriginAdMobileInitialContent', 
								'OriginAdMobileTriggeredContent');
	
		//print_r($data);
		foreach($data['data'] as $schedule) {
			foreach($modelArray as $modelName) {
				$dataSave	= $schedule[$modelName];
				
				foreach($dataSave as $key=>$content) {
					unset($dataSave[$key]['origin_ad_schedule_id']);
					//unset($dataSave[$key]['content']);
					unset($dataSave[$key]['render']);
					//unset($dataSave[$key]['order']);
					$dataSave[$key]['content']= json_encode($content['content']);
					$dataSave[$key]['config'] = json_encode($content['config']);
				}
				
				if($dataSave) {
					$this->$modelName->saveAll($dataSave);
					//Wipe previous ID
					$this->$modelName->create();
				}
			}
		}
		$this->_adModifyUpdate($data['originAd_id']);
		return $this->_creatorAdLoad($data);
	}

	
/* =======================================================================
	Demo
========================================================================== */
	/**
	* Public demo page viewer
	* Permissions: All
	*/
	public function demo() {
		$this->layout 	= 'demo/public';
		
		$demo = $this->OriginDemo->find('first', 
			array(
				'conditions'=>array(
					'OriginDemo.alias'=>$this->request->params['alias']
				)
			)
		);
		
		if($demo['OriginDemo']['status'] !== '1') {
			throw new NotFoundException();
		}
		
		$demo['OriginDemo']['config']	= json_decode($demo['OriginDemo']['config']);
		$this->set('demo', json_encode($demo));
		$this->set('title_for_layout', $demo['OriginDemo']['name']);
		$this->render('/Origin/demo/public');
	}
	
	/**
	* Listing of all saved demo pages
	*/
/*
	public function demoList() {
		$this->set('title_for_layout', 'Demo Listing');
	}
	
*/
	/**
	* Create a demo page
	* Permissions: Logged in
	*/
	public function demoCreate() {
		$this->layout 	= 'demo/creator';
		$origin_ad		= $this->OriginAd->find('first', 
			array(
				'conditions'=>array(
					'OriginAd.id'=>$this->request->params['originAd_id']
				),
				'recursive'=>-1
			)
		);
		
		$origin_ad['OriginAd']['config']	= json_decode($origin_ad['OriginAd']['config']);
		$origin_ad['OriginAd']['content']	= json_decode($origin_ad['OriginAd']['content']);
		
		$this->set('demoEdit', false);
		$this->set('origin_ad', json_encode($origin_ad));
		$this->set('title_for_layout', $origin_ad['OriginAd']['name'].' Demo');
		
		$this->render('/Origin/demo/create');
		
		//$this->jsonAdUnit($this->request->params['originAd_id']);
		//$this->render('/Origin/json/json_ad_unit');	
	}
	
	/**
	* Delete a demo page
	* Permissions: Developers
	*/
	public function demoDelete($data) {
		if($this->OriginDemo->delete($data['id'])) {
			$this->layout	= 'ajax';
			$this->jsonDemo($data);
			return $this->render('/Origin/json/json_demo');
		}
	}
	
	/**
	* Edit a demo page
	* Permissions: Logged in
	*/
	public function demoEdit() {
		$this->layout 	= 'demo/creator';
		$origin_demo 	= $this->OriginDemo->find('first', 
			array(
				'conditions'=>array(
					'OriginDemo.alias'=>$this->request->params['alias']
				),
				'recursive'=>-1
			)
		);
		
		$origin_demo['OriginDemo']['config']	= json_decode($origin_demo['OriginDemo']['config']);
		
		$this->set('origin_ad', json_encode($origin_demo));
		$this->set('demoEdit', true);
		$this->set('title_for_layout', $origin_demo['OriginDemo']['name'].' Demo');
		
		$this->render('/Origin/demo/create');
	}
	
	/**
	* Loads a specified demo page template
	* Permissions: All
	*/
	public function demoLoadTemplate() {
		$this->layout 	= 'templates';
		$template 		= $this->request->params['template'];
		$this->set('template', $template);
	}
	
	/**
	* Default Origin Demo page
	* Permissions: All
	*/
	public function demoOrigin() {
		App::import('Vendor', 'pseudocrypt');
		$this->layout 	= 'demo/default';
		
		$origin_ad		= $this->OriginAd->find('first', 
			array(
				'recursive'=>-1,
				'conditions'=>array(
					'OriginAd.id'=>PseudoCrypt::unhash($this->request->params['originAd_id'])
				),
				'fields'=>array(
					'OriginAd.id',
					'OriginAd.name',
					'OriginAd.config',
					'OriginAd.type'
				)
			)
		);
		$this->set('title_for_layout', $origin_ad['OriginAd']['name']);
		$this->set('demo', json_encode($origin_ad));
		$this->render('/Origin/demo/default');
	}
	
	/**
	* Origin demo manager
	*/
/*
	public function demoManager() {
		$this->set('title_for_layout', 'Demo Manager');
	}
*/
	
	/**
	* Save/update an Origin site demo page
	*/
	private function demoSave($data) {
		$data['config']			= json_encode($data['config']);
		
		if(!isset($data['id'])) {
			$data['create_by']	= $this->UserAuth->getUserId();
		} else {
			unset($data['origin_ad_id']);
			//unset($data['render']);
		}
		
		$data['status']			= $data['status']? 1: 0;
		$data['modify_date']	= date('Y-m-d H:i:s');
		$data['modify_by']		= $this->UserAuth->getUserId();
		
		if($this->OriginDemo->save($data)) {
			if(empty($data['alias'])) {
				App::import('Vendor', 'pseudocrypt');
				$aliasData['id']	= $this->OriginDemo->id;
				$aliasData['alias'] = $data['alias'] = PseudoCrypt::hash($aliasData['id'], 6);	
				$this->OriginDemo->save($aliasData);

			}
			echo $data['alias'];
		}
	}



/* =======================================================================
	Platform
========================================================================== */
	/**
	* Embed code iframe 
	* Permissions: Logged in
	*/
	public function platformAdEmbed() {
		$this->layout 	= 'embed';
		$template 		= 'adEmbed';
		
		$this->set('title_for_layout', 'Origin Ad Embed');
		$this->set('originAd_id', $this->request->params['originAd_id']);
		$this->set('originAd_type', $this->request->params['originAd_type']);
		$this->set('template', $template);
		
		$this->render('/Origin/platform/ad_embed');
	}
	
	/**
	* Email demo page
	* Permissions: Logged in
	*/
	public function platformEmailDemo($data) {
		App::uses('CakeEmail', 'Network/Email');
		
		$email 	= new CakeEmail();
		$email->template('demo');
		$email->emailFormat('html');
		$email->from(array('willie.fu@gmail.com'=>'Evolve Origin'));
		$email->to('willie.fu@gmail.com');
		$email->subject('[Evolve Origin] Demo Page (ID'+$data['id']+') - '.$data['name']);
		$email->viewVars(array('data' => $data));
		//$test = $email->send();
		//print_r($test);
	}
	
	/**
	* Email embed code
	* Permissions: Logged in
	*/
	public function platformEmailEmbed($data) {
		App::uses('CakeEmail', 'Network/Email');
		
		$email 	= new CakeEmail();
		$email->template('embed');
		$email->emailFormat('html');
		$email->from(array('willie.fu@gmail.com'=>'Evolve Origin'));
		$email->to('willie.fu@gmail.com');
		$email->subject('[Evolve Origin] Project Details (ID'+$data['ad']['id']+') - '.$data['ad']['name']);
		$email->viewVars(array('data' => $data));
		//$test = $email->send();
		//print_r($test);
	}
	
	/**
	* Loads a specified ad component
	* Permissions: All
	*/
	public function platformLoadComponent() {
		$this->layout 	= 'components';
		$component 		= $this->request->params['component'];
		$this->set('component', $component);
		$this->render('/Origin/platform/ad_component');
	}
	
	/**
	* Load CakePHP element template
	* Permissions: All
	*/
	public function platformLoadElement() {
        $this->autoRender 	= false;
        $this->layout	 	= 'ajax';
        $this->render('/elements/'.$this->request->params['element']);
    }

	/**
	* POST data router
	* Permissions: Logged in
	*/
	public function platformPost() {
		$this->autoRender = false;
		if($this->request->data['route']) {
			$route		= $this->request->data['route'];
			unset($this->request->data['route']);
			$response	= $this->$route($this->request->data);
			$this->set('post', $response);
		}
	}
	
	/**
	* RSS parser
	* Permissions : All
	*/
	public function platformRssFeed() {
		App::import('Vendor', 'xmlToArray');
		$this->layout	= 'xml/default';
		
		$xml = simplexml_load_file('http://'.$this->request->params['url']);
		$this->set('xml', xmlToArray::convert($xml));
		
		$this->render('/Origin/platform/rss_feed');
	}
	
	/**
	* System-wide AJAX file uploader
	* Permissions: Logged in
	*/
	public function platformUpload() {
		App::import('Vendor', 'UploadHandler', array('file'=>'UploadHandler/uploadHandler.class.php'));
		
		$upload_handler = new UploadHandler();
		header('Pragma: no-cache');
		header('Cache-Control: private, no-cache');
		header('Content-Disposition: inline; filename="files.json"');
		header('X-Content-Type-Options: nosniff');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
		header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');
		
		switch($_SERVER['REQUEST_METHOD']) {
			case 'POST':
				$upload_handler->post();
		        break;
		    default:
		        header('HTTP/1.1 405 Method Not Allowed');
		}
		exit;
	}
	
	/**
	* System level folder removal
	* Permissions: Logged in
	*/
	private function _removeFolder($dir) {
	    $files = scandir($dir);
	    array_shift($files);    // remove '.' from array
	    array_shift($files);    // remove '..' from array
	    
	    foreach ($files as $file) {
	        $file = $dir . '/' . $file;
	        if (is_dir($file)) {
	            $this->_removeFolder($file);
	            rmdir($file);
	        } else {
	            unlink($file);
	        }
	    }
	    rmdir($dir);
	}
	
	/**
	* Generic remove function for system-level ops
	* Permissions: NA
	*/
	private function systemRemove($data) {
		if($this->{$data['model']}->delete($data['id'])) {
			return $this->{'_load'.$data['model']}();	
		}
	}

	/**
	* Generic save function for system-level ops
	* Permissions: NA
	*/
	private function systemSave($data) {
		if(isset($data['content'])) {
			$data['content']		= json_encode($data['content']);
		}
		
		if(isset($data['config'])) {
			$data['config']			= json_encode($data['config']);
		}
		
		if(!isset($data['id'])) {
			$data['create_by']	= $this->UserAuth->getUserId();
		}
		
		$data['modify_date']	= date('Y-m-d H:i:s');
		$data['modify_by']		= $this->UserAuth->getUserId();
		
		if($this->{$data['model']}->save($data)) {
			return $this->{'_load'.$data['model']}();
		}
	}

	/**
	* Toggles the 'status' field of a model
	* Permissions: NA
	*/
	private function toggleStatus($data) {
		$data['modify_date']	= date('Y-m-d H:i:s');
		$data['modify_by']		= $this->UserAuth->getUserId();
		
		if($this->{$data['model']}->save($data)) {
			return $this->{'_load'.$data['model']}();
		}
	}

/* =======================================================================
	Settings
========================================================================== */
	/**
	* Origin ad component manager
	* Permissions: Super Admin only
	*/
	public function adminComponentList() {
		$this->set('title_for_layout', 'Ad Components');
		$this->render('platform/ad_components');
	}
	
	/**
	* Settings page
	* Permissions: Super Admin only
	*/
	public function adminSettings() {
		$this->set('title_for_layout', 'Settings');
		$this->render('platform/settings');
	}
	
	/**
	* Origin site manager
	* Permissions: Super Admin only
	*/
	public function adminSiteList() {
		$this->set('title_for_layout', 'Demo Manager');
		$this->render('platform/ad_site_list');
	}
	
	/**
	* Origin ad template manager
	* Permissions: Super Admin only
	*/
	public function adminTemplateList() {
		$this->set('title_for_layout', 'Ad Templates');
		$this->render('platform/ad_templates');
	}
	
/* =======================================================================
	JSON feeds
========================================================================== */

	/**
	* JSON feed of user activity
	* NOT CURRENTLY USED
	* Permissions: Logged in
	*/
	public function jsonActivity() {
		$activities = $this->OriginAd->query('
						SELECT id, name, modify_by as userid, date, action 
						FROM (
							SELECT id, name, create_by, modify_by, date, action 
							FROM (
								SELECT id, name, create_by, modify_by, create_date as "date", "created" as "action"
								FROM origin_ads ORDER BY create_date DESC LIMIT 30
								) AS A
							UNION ALL (
								SELECT id, name, create_by, modify_by, modify_date as "date", "updated" as "action"
								FROM origin_ads ORDER BY modify_date DESC LIMIT 30
								)
							) AS activity
						ORDER BY date DESC LIMIT 10');
		
		$users		= $this->User->find('all');
		$this->set('activities', $activities);
		$this->set('users', $users);
	}
	
	/**
	* JSON feed of the specified Origin ad template
	* Permissions: 
	* UNUSED?
	*/
/*
	public function jsonAdTemplate() {
		$template_id		= $this->request->params['template_id'];
		$origin_template	= $this->OriginTemplate->find('first', 
			array(
				'conditions'=>array('OriginTemplate.id'=>$template_id)
			)
		);
		$this->set('origin_template', $origin_template);
	}
*/
	
	/**
	* JSON feed of a specified Origin ad unit
	* Permissions: All
	*/
	public function jsonAdUnit($originAd_id = '') {
		$originAd_id 	= ($originAd_id)? $originAd_id: $this->request->params['originAd_id'];
		$origin_ad		= $this->OriginAd->find('first', 
			array(
				'recursive'=>2,
				'conditions'=>array(
					'OriginAd.id'=>$originAd_id
				)
			)
		);
		$this->set('origin_ad', $origin_ad);
		return $origin_ad;
	}
	
	/**
	* JSON feed for background image data for ad listing page
	* Permissions: Logged in
	*/
	public function jsonAdUnitExpand() {
		$origin_ad	= $this->OriginAd->find('first',
			array(
				'conditions'=>array(
					'OriginAd.id'=>$this->request->params['originAd_id']
				),
				'fields'=>array(
					'Desktop.*',
					'Mobile.*',
					'Tablet.*',
				),
				'joins'=>array(
					array(
						'table'=>'origin_ad_desktop_initial_contents',
						'alias'=>'Desktop',
						'type'=>'LEFT',
						'conditions'=>array(
							'Desktop.origin_ad_id = OriginAd.id',
							'Desktop.type = "background"'
						)
					),
					array(
						'table'=>'origin_ad_mobile_initial_contents',
						'alias'=>'Mobile',
						'type'=>'LEFT',
						'conditions'=>array(
							'Mobile.origin_ad_id = OriginAd.id',
							'Mobile.type = "background"'
						)
					),
					array(
						'table'=>'origin_ad_tablet_initial_contents',
						'alias'=>'Tablet',
						'type'=>'LEFT',
						'conditions'=>array(
							'Tablet.origin_ad_id = OriginAd.id',
							'Tablet.type = "background"'
						)
					),
				)
			)
		);
		$this->set('origin_ad', $origin_ad);
		return $origin_ad;
	}
	
	/**
	* JSON feed of a demos for a specific ad unit
	* Permissions: Logged in
	*/
	public function jsonDemo($data = '') {
		App::import('Vendor', 'pseudocrypt');
		$originAd_id	= ($data)? $data['origin_ad_id']: $this->request->params['originAd_id'];
		$origin_demo 	= $this->OriginDemo->find('all', 
			array(
				'conditions'=>array(
					'OriginDemo.origin_ad_id'=>$originAd_id
				)
			)
		);
		//Append default page
		array_push($origin_demo, 
			['OriginDemo'=>
				[
					'name'=>'Origin Demo Page (default)',
					'alias'=>'Origin/'.PseudoCrypt::hash($originAd_id, 6)
				]
			]);
		$this->set('origin_demo', $origin_demo);
	}
	
	/**
	* JSON feed of all demos
	* Permissions: 
	* UNUSED
	*/
/*
	public function jsonDemoList() {
		
	}
*/
	
	/**
	* JSON feed of a specific Origin ad unit's library
	* Permissions: Logged in
	*/
	public function jsonLibrary() {
		$this->set('originAd_id', $this->request->params['originAd_id']);	
	}
	
	/**
	* JSON feed of all Origin ad units
	* Permissions: Logged in
	*/
	public function jsonList() {
		$origin_ads		= $this->OriginAd->find('all', 
			array(
				'order'=>array('OriginAd.id DESC'),
				'recursive'=>-1
			));
		$users			= $this->User->find('all');
		
		$this->set('origin_ads', $origin_ads);
		$this->set('users', $users);
	}
	
	/**
	* JSON feed of all showcase Origin ad units
	* UNUSED
	*/
/*
	public function jsonListShowcase() {
		
		$origin_ads		= $this->OriginAd->find('all', 
			array(
				'conditions'=>array(
					'OriginAd.status'=>1,
					'OriginAd.showcase'=>1,
					'OriginAd.type'=>$this->request->params['type']
				),
				'fields'=>array(
					'OriginAd.id',
					'OriginAd.name',
					'OriginAd.config',
					'OriginAd.content',
					'OriginAd.status',
					'OriginAd.showcase'),
				'order'=>array('OriginAd.id DESC'),
				'recursive'=>2
			));
		$this->set('origin_ads', $origin_ads);
	}
*/
	
	/**
	* JSON feed of all Origin ad components
	* Permissions: Logged in
	*/
	public function jsonComponent() {
		$origin_components	= $this->OriginComponent->find('all',
			array(
				'order'=>array('OriginComponent.name ASC')
			)
		);
		$this->set('origin_components', $origin_components);
	}
	
	/**
	* JSON feed of all Origin demo sites
	* Permissions: Logged in
	*/
	public function jsonSite() {
		$origin_sites	= $this->OriginSite->find('all', 
			array(
				'order'=>array('OriginSite.name ASC')
			)
		);
		$this->set('origin_sites', $origin_sites);
	}
	
	/**
	* JSON feed of all Origin ad templates
	* Permissions: Logged in
	*/
	public function jsonTemplate() {
		$origin_templates	= $this->OriginTemplate->find('all',
			array(
				'order'=>array('OriginTemplate.name ASC')
			)
		);
		$this->set('origin_templates', $origin_templates);
	}
	
	/**
	* JSON feed of unique Origin Ad Templates for the homepage
	* Permissions: All
	*/
	public function jsonHomepage() {
		$origin_templates	= $this->OriginTemplate->find('all',
			array(
				'conditions'=>array(
					'OriginTemplate.status'=>1,
					'OriginAds.showcase'=>1
				),
				'fields'=>array(
					'OriginTemplate.*',
					'OriginAds.*',
					'DesktopInitial.*',
					'DesktopTriggered.*',
					'MobileInitial.*',
					'MobileTriggered.*',
					'TabletInitial.*',
					'TabletTriggered.*'
				),
				'joins'=>array(
					array(
						'table'=>'origin_ads',
						'alias'=>'OriginAds',
						'type'=>'LEFT',
						'conditions'=>array(
							'OriginAds.type_id = OriginTemplate.id'
						)
					),
					array(
						'table'=>'origin_ad_desktop_initial_contents',
						'alias'=>'DesktopInitial',
						'type'=>'LEFT',
						'conditions'=>array(
							'DesktopInitial.origin_ad_id = OriginAds.id',
							'DesktopInitial.type = "background"'
						)
					),
					array(
						'table'=>'origin_ad_desktop_triggered_contents',
						'alias'=>'DesktopTriggered',
						'type'=>'LEFT',
						'conditions'=>array(
							'DesktopTriggered.origin_ad_id = OriginAds.id',
							'DesktopTriggered.type = "background"'
						)
					),
					array(
						'table'=>'origin_ad_mobile_initial_contents',
						'alias'=>'MobileInitial',
						'type'=>'LEFT',
						'conditions'=>array(
							'MobileInitial.origin_ad_id = OriginAds.id',
							'MobileInitial.type = "background"'
						)
					),
					array(
						'table'=>'origin_ad_mobile_triggered_contents',
						'alias'=>'MobileTriggered',
						'type'=>'LEFT',
						'conditions'=>array(
							'MobileTriggered.origin_ad_id = OriginAds.id',
							'MobileTriggered.type = "background"'
						)
					),
					array(
						'table'=>'origin_ad_tablet_initial_contents',
						'alias'=>'TabletInitial',
						'type'=>'LEFT',
						'conditions'=>array(
							'TabletInitial.origin_ad_id = OriginAds.id',
							'TabletInitial.type = "background"'
						)
					),
					array(
						'table'=>'origin_ad_tablet_triggered_contents',
						'alias'=>'TabletTriggered',
						'type'=>'LEFT',
						'conditions'=>array(
							'TabletTriggered.origin_ad_id = OriginAds.id',
							'TabletTriggered.type = "background"'
						)
					)
				),
				'order'=>array(
					'OriginTemplate.name ASC'
				)
			)
		);
		$this->set('origin_templates', $origin_templates);
	}


/* =======================================================================
	AUDIT
========================================================================== */
	/**
	* Loads the component model
	* USED??
	*/
	private function _loadOriginComponent() {
		$this->layout	= 'ajax';
		$origin_components	= $this->OriginComponent->find('all', 
			array('order'=>array('OriginComponent.name ASC'))
		);
		$this->set('origin_components', $origin_components);
		return $this->render('/Origin/json/json_component');
	}
	

	/**
	* Loads the template model
	* USED?
	*/
	private function _loadOriginTemplate() {
		$this->layout	= 'ajax';
		$origin_templates	= $this->OriginTemplate->find('all', 
			array('order'=>array('OriginTemplate.name ASC'))
		);
		$this->set('origin_templates', $origin_templates);
		return $this->render('/Origin/json/json_template');
	}
	
	/**
	* Loads the site demo list
	* USED?
	*/
	private function _loadOriginSite() {
		$this->layout	= 'ajax';
		$origin_sites	= $this->OriginSite->find('all', 
			array('order'=>array('OriginSite.name ASC'))
		);
		$this->set('origin_sites', $origin_sites);
		return $this->render('/Origin/json/json_site');
	}

	/**
	* Loads the model data
	* USED?
	*/
	private function _loadDemos() {
		$this->layout	= 'ajax';
		$origin_demos	= $this->OriginDemo->find('all',
		array(
			'order'=>array('OriginDemo.name ASC')
		));
		$this->set('origin_demos', $origin_demos);
		return $this->render('/Origin/json/json_demo');
	}
	
		
	/**
	* Toggle an Origin site demo status
	* USED?
	*/
	private function demoStatus($data) {
		$data['modify_date']	= date('Y-m-d H:i:s');
		$data['modify_by']		= $this->UserAuth->getUserId();
		
		if($this->OriginDemo->save($data)) {
			return $this->_loadDemos();
		}
	}
	

/* =======================================================================
	Settings
========================================================================== */		
	
	
	/**
	* Origin system permissions page //UNUSED?
	*/
/*
	public function dashboardAccess() {
		$this->set('title_for_layout', 'System Settings');
	}
*/
	
	/**
	* Adds a new user permissions group
	*/
	private function dashboardGroupAdd($data) {
		$this->UserGroup->set($data);
		if($this->UserGroup->addValidate()) {
			$this->UserGroup->save($data, false);
		}
	}
	
	/**
	* ?
	*/
/*
	public function dashboardUser() {
		
	}
*/
	
	/**
	* Creates a new user
	*/
	private function dashboardUserAdd($data) {
		if($this->User->RegisterValidate()) {
			$data['email_verified']		= 1;
			$data['active']				= 1;
			$salt						= $this->UserAuth->makeSalt();
			$data['salt'] 				= $salt;
			$data['password'] 			= $this->UserAuth->makePassword($data['password'], $salt);
			$this->User->save($data,false);
		} else {
			return json_encode($this->User->invalidFields());
		}
	}
	
	/**
	* Updates an user's password
	*/
	private function dashboardUserPasswordUpdate($data) {
		$userId = $this->UserAuth->getUserId();		
		$this->User->set($data);
		
		if($this->User->RegisterValidate()) {
			$user	= array();
			$user['User']['id']=$userId;
			$salt=$this->UserAuth->makeSalt();
			$user['User']['salt'] = $salt;
			$user['User']['password'] = $this->UserAuth->makePassword($data['password'], $salt);
			$this->User->save($user,false);
			$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
		} else {
			return json_encode($this->User->invalidFields());
		}
	}
	
	/**
	* Toggles an user's status
	*/
	private function dashboardUserStatus($data) {
		$userId			= $data['id'];
		$active			= $data['status'];
		
		if (!empty($userId)) {
			$user=array();
			$user['User']['id']=$userId;
			$user['User']['active']=($active) ? 1 : 0;
			$this->User->save($user,false);
		}	
	}
	
	/**
	* Updates an user's account
	*/
	private function dashboardUserUpdate($data) {		
		if(isset($data['cpassword'])) {
			$this->User->set($data);
			
			if($data['password'] === $data['cpassword'] && !empty($data['password'])) {
				$salt				= $this->UserAuth->makeSalt();
				$data['salt'] 		= $salt;
				$data['password'] 	= $this->UserAuth->makePassword($data['password'], $salt);
				if($this->User->RegisterValidate()) {
					$this->User->save($data, false);
				} else {
					return json_encode($this->User->invalidFields());
				}
			} else {
				unset($data['password']);
			}
		} else {
			unset($data['salt']);
			unset($data['password']);
			unset($data['cpassword']);
			unset($data['email_verified']);
			unset($data['active']);
			unset($data['ip_address']);
			unset($data['created']);
			unset($data['modified']);
			$this->User->set($data);
			
			if($this->User->RegisterValidate()) {
				$this->User->save($data, false);
			} else {
				return json_encode($this->User->invalidFields());
			}
		}	
	}
}