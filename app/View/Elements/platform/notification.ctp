<div id="origin-notification" class="originUI-bgColor originUI-shadow" data-ng-class="notification.type" data-ng-if="notification.show === true" data-ng-animate="'originUI-fade'">
	<img id="originNotification-icon" data-ng-src="{{notification.icon}}">
	<span id="originNotification-content">{{notification.content}}</span>
	<a href="javascript:void(0)" id="originNotification-close" data-ng-click="notificationClose()">close</a>
</div>