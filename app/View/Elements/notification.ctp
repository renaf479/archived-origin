<div id="origin-notification" class="originUI-bgColor originUI-shadow" ng:class="notification.type" ng:show="notification.show === true" ng:animate="'originUI-fade'">
	<img id="originNotification-icon" ng:src="{{notification.icon}}">
	<span id="originNotification-content">{{notification.content}}</span>
	<a href="javascript:void(0)" id="originNotification-close" ng:click="notificationClose()">close</a>
</div>