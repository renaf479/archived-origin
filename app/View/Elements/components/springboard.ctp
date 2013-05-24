<div id="editor-springboard" ng:controller="componentCtrl">	
	<div class="originUI-modalLeft">
		<strong>Select Video</strong>
		<span id="editorSpringboard-listPrev" ng:click="springboardPage('prev')">Prev</span>
		<span id="editorSpringboard-listNext" ng:click="springboardPage('next')">Next</span>
		<ul id="editorSpringboard-list" class="originUI-bgColor originUI-borderColor">
			<li class="originUIList-item" ng:repeat="video in springboard.item">
				<a href="javascript:void(0);" class="originUI-hover" ng:click="springboardSelect(video)">{{video.title}}</a>
			</li>
		</ul>
	</div>
	<div class="originUI-modalRight">
		<!-- <div id="editorSpringboard-upload" class="">Upload Video</div> -->
		<strong>{{springboardPanel}}</strong>
		<span id="editorSpringboard-btnOptions" ng:click="springboardPage('options')">Options</span>
		<span id="editorSpringboard-btnPreview" ng:click="springboardPage('preview')">Preview</span>
		<div id="editorSpringboard-preview" class="originUI-bgColor" ng:bind-html-unsafe="editor.content.preview" ng:class="{'originUI-placeholder': editor.content.preview == undefined}" ng:show="springboardPanel=='Preview'"></div>
		<div id="editorSpringboard-config" ng:show="springboardPanel=='Options'">
			<ul class="originUI-list">
			<?php
				/*
					var springboard = {
			autoClose: function(timer) {
				$sb(springboardPlayerId).onFinish(function() {
					setTimeout(function(){emcOriginAd.adClose();}, timer * 1000);
				});	
			},
			autoMute: function() {
				if(autoOpen) {
					$sb(springboardPlayerId).mute();
				}
			},
			autoPlay: function() {
				$sb(springboardPlayerId).play();
			},
			playerMute: function(toggle) {
				if(!autoOpen && toggle === "off") {
					$sb(springboardPlayerId).unmute();
				} else if(!autoOpen && toggle === "on") {
					$sb(springboardPlayerId).mute();
				}
			},
			unmuteHover: function() {
				$sb(springboardPlayerId).onMouseOver(function() {
					if($sb(springboardPlayerId).getStatus().muted) {
						$sb(springboardPlayerId).unmute();
					}
				});
			},
			unmuteRestart: function() {
				$sb(springboardPlayerId).onUnmute(function() {
					$sb(springboardPlayerId).seek(0);
				});
			}
		}
				*/
			
			
				$settings	= array(
					'Auto - Play'=>'autoplay',
					'Auto - Mute'=>'automute',
					'Auto - Close'=>'autoclose',
					'Mute Player'=>'muteplayer',
					'Hover Unmute'=>'unmutehover',
					'Unmute Restart'=>'unmuterestart'
					);
				foreach($settings as $key=>$setting) {
					$id	= 'editorSpringboard'.$setting;
			?>
				<li>
					<label class="inline"><?php echo $key;?></label>
					<div class="originUI-switch inline">
					    <input type="checkbox" name="<?php echo $id;?>" class="originUI-switchInput" id="<?php echo $id;?>" ng:model="editor.content.<?php echo $setting;?>" ng:checked="editor.content.<?php echo $setting;?>">
					    <label class="originUI-switchLabel" for="<?php echo $id;?>">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Yes</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">No</div>
								</div>
						    </div>
					    </label>
				    </div> 
				</li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
		
	<script type="text/javascript">
		var componentCtrl = function($scope, $rootScope, Origin) {
			var _scope 	= $scope.$parent,
				page 	= 0,
				videoId;
			
			_scope.editor.content.iframe= true;
			_scope.editor.config.width	= '300px',
			_scope.editor.config.height	= '169px';
			
			//Set defaults if creating instead of edit
			if(!$scope.editor.content.videoId) {
				$scope.editor.content.autoplay	= true;
				$scope.editor.content.automute	= true;
				$scope.editor.content.autoclose	= true;	
			}
				
			$scope.springboard			= {};
			//$scope.springboardPreview 	= {};
			$scope.springboardPanel		= 'Preview';
			
			$scope.springboardPage = function(event) {
				switch(event) {
					case 'options':
						$scope.springboardPanel	= 'Options';
						break;
					case 'preview':
						$scope.springboardPanel	= 'Preview';
						break;
					case 'next':
						page++;
						$scope.springboardLoad();
						break;
					case 'prev':
						if(page > 0) {
							page--;
							$scope.springboardLoad();	
						}
						break;
				}
			}
			
			$scope.springboardLoad = function() {
				Origin.getRss('cms.springboardplatform.com/xml_feeds_advanced/index/1307/0/0/0/'+page+'/7/').then(function(response) {
					$scope.springboard	= response.rss.channel;
				});	
			}
			
			$scope.springboardSelect = function(video) {
				$scope.editor.content.videoId	= video.id;
				$scope.springboardPanel			= 'Preview';
				$scope.editor.content.preview	= '<iframe id="evor006_'+$scope.editor.content.videoId+'" src="http://cms.springboardplatform.com/embed_iframe/1307/video/'+$scope.editor.content.videoId+'/evor006/evolve-origin/10" width="274" height="154" frameborder="0" scrolling="no"></iframe>';
			}
			
			$rootScope.creatorModalSave = function() {
						
				$scope.editor.content.embed 	= '<scri'+'pt language="javascript" type="text/javascript" src="http://www.springboardplatform.com/jsapi/embed"></scri'+'pt>';
				$scope.editor.content.embed		+= '<div class="videoPlayer" id="evor001_'+$scope.editor.content.videoId+'"></div>';
				$scope.editor.content.embed		+= '<scri'+'pt type="text/javascript">$sb("evor001_'+$scope.editor.content.videoId+'",{"sbFeed":{"partnerId":1307,"type":"video","contentId":'+$scope.editor.content.videoId+',"cname":"evolve-origin"},"style":{"width":"'+_scope.editor.config.width+'","height":"'+_scope.editor.config.height+'"}});</scri'+'pt>';
				$scope.editor.content.embed		+= '<scri'+'pt type="text/javascript"></scri'+'pt>';
				$scope.editor.content.embed		+= '<scri'+'pt type="text/javascript" src="http://s0.2mdn.net/instream/html5/ima3.js"></scri'+'pt>';
				
				$scope.editor.render 	= '<iframe class="embed" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/adIframe/%model%/%id%" frameborder="0" scrolling="no" collapseIframe></iframe>';
			
				_scope.creatorModalSaveContent($scope.editor);
			};
			
			$scope.springboardLoad();
		}
	</script>
</div>