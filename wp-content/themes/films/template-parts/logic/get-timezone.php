<?php 

	$timezone_display = null;
	// timezone stuff
	if(!empty($tz)):
		if ($tz == 'Pacific/Pago_Pago') {
			$timezone_display = '(GMT-11:00)';
		} elseif ($tz == 'Pacific/Honolulu') {
			$timezone_display = '(GMT-10:00)';
		} elseif ($tz == 'Pacific/Tahiti') {
			$timezone_display = '(GMT-10:00)';
		} elseif ($tz == 'America/Anchorage') {
			$timezone_display = '(GMT-09:00)';
		} elseif ($tz == 'America/Los_Angeles') {
			$timezone_display = '(GMT-08:00)';
		} elseif ($tz == 'America/Denver') {
			$timezone_display = '(GMT-07:00)';
		} elseif ($tz == 'America/Chicago') {
			$timezone_display = '(GMT-06:00)';
		} elseif ($tz == 'America/New_York') {
			$timezone_display = '(GMT-05:00)';
		} elseif ($tz == 'America/Halifax') {
			$timezone_display = '(GMT-04:00)';
		} elseif ($tz == 'America/Argentina') {
			$timezone_display = '(GMT-03:00)';
		} elseif ($tz == 'America/Sao_Paulo') {
			$timezone_display = '(GMT-02:00)';
		} elseif ($tz == 'Atlantic/Azores') {
			$timezone_display = '(GMT-01:00)';
		} elseif ($tz == 'Europe/London') {
			$timezone_display = '(GMT+00:00)';
		} elseif ($tz == 'Europe/Berlin') {
			$timezone_display = '(GMT+01:00)';
		} elseif ($tz == 'Europe/Helsinki') {
			$timezone_display = '(GMT+02:00)';
		} elseif ($tz == 'Europe/Istanbul') {
			$timezone_display = '(GMT+03:00)';
		} elseif ($tz == 'Asia/Dubai') {
			$timezone_display = '(GMT+04:00)';
		} elseif ($tz == 'Asia/Kabul') {
			$timezone_display = '(GMT+04:30)';
		} elseif ($tz == 'Indian/Maldives') {
			$timezone_display = '(GMT+05:00)';
		} elseif ($tz == 'Asia/Calcutta') {
			$timezone_display = '(GMT+05:30)';
		} elseif ($tz == 'Asia/Kathmandu') {
			$timezone_display = '(GMT+05:45)';
		} elseif ($tz == 'Asia/Dhaka') {
			$timezone_display = '(GMT+06:00)';
		} elseif ($tz == 'Indian/Cocos') {
			$timezone_display = '(GMT+06:30)';
		} elseif ($tz == 'Asia/Bangkok') {
			$timezone_display = '(GMT+07:00)';
		} elseif ($tz == 'Asia/Hong_Kong') {
			$timezone_display = '(GMT+08:00)';
		} elseif ($tz == 'Asia/Pyongyang') {
			$timezone_display = '(GMT+08:30)';
		} elseif ($tz == 'Asia/Tokyo') {
			$timezone_display = '(GMT+09:00)';
		} elseif ($tz == 'Australia/Darwin') {
			$timezone_display = '(GMT+09:30)';
		} elseif ($tz == 'Australia/Brisbane') {
			$timezone_display = '(GMT+10:00)';
		} elseif ($tz == 'Australia/Adelaide') {
			$timezone_display = '(GMT+10:30)';
		} elseif ($tz == 'Australia/Sydney') {
			$timezone_display = '(GMT+11:00)';
		} elseif ($tz == 'Pacific/Nauru') {
			$timezone_display = '(GMT+12:00)';
		} elseif ($tz == 'Pacific/Auckland') {
			$timezone_display = '(GMT+13:00)';
		} elseif ($tz == 'Pacific/Kiritimati') {
			$timezone_display = '(GMT+14:00)';
		}
	endif;



		// Pacific/Pago_Pago : offset: '-11:00' -  Pago Pago (GMT-11:00)
		// Pacific/Honolulu : offset: '-10:00' -  Hawaii Time (GMT-10:00)
		// Pacific/Tahiti : offset: '-10:00' -  Tahiti (GMT-10:00)
		// America/Anchorage : offset: '-09:00' -  Alaska Time (GMT-09:00)
		// America/Los_Angeles : offset: '-08:00' -  Pacific Time (GMT-08:00)
		// America/Denver : offset: '-07:00' -  Mountain Time (GMT-07:00)
		// America/Chicago : offset: '-06:00' -  Central Time (GMT-06:00)
		// America/New_York : offset: '-05:00' -  Eastern Time (GMT-05:00)
		// America/Halifax : offset: '-04:00' -  Atlantic Time - Halifax (GMT-04:00)
		// America/Argentina : offset: '-03:00' -  Buenos Aires (GMT-03:00)
		// America/Sao_Paulo : offset: '-02:00' -  Sao Paulo (GMT-02:00)
		// Atlantic/Azores : offset: '-01:00' -  Azores (GMT-01:00)
		// Europe/London : offset: '+00:00' -  London (GMT+00:00)
		// Europe/Berlin : offset: '+01:00' -  Berlin (GMT+01:00)
		// Europe/Helsinki : offset: '+02:00' -  Helsinki (GMT+02:00)
		// Europe/Istanbul : offset: '+03:00' -  Istanbul (GMT+03:00)
		// Asia/Dubai : offset: '+04:00' -  Dubai (GMT+04:00)
		// Asia/Kabul : offset: '+04:30' -  Kabul (GMT+04:30)
		// Indian/Maldives : offset: '+05:00' -  Maldives (GMT+05:00)
		// Asia/Calcutta : offset: '+05:30' -  India Standard Time (GMT+05:30)
		// Asia/Kathmandu : offset: '+05:45' -  Kathmandu (GMT+05:45)
		// Asia/Dhaka : offset: '+06:00' -  Dhaka (GMT+06:00)
		// Indian/Cocos : offset: '+06:30' -  Cocos (GMT+06:30)
		// Asia/Bangkok : offset: '+07:00' -  Bangkok (GMT+07:00)
		// Asia/Hong_Kong : offset: '+08:00' -  Hong Kong (GMT+08:00)
		// Asia/Pyongyang : offset: '+08:30' -  Pyongyang (GMT+08:30)
		// Asia/Tokyo : offset: '+09:00' -  Tokyo (GMT+09:00)
		// Australia/Darwin : offset: '+09:30' -  Central Time - Darwin (GMT+09:30)
		// Australia/Brisbane : offset: '+10:00' -  Eastern Time - Brisbane (GMT+10:00)
		// Australia/Adelaide : offset: '+10:30' -  Central Time - Adelaide (GMT+10:30)
		// Australia/Sydney : offset: '+11:00' -  Eastern Time - Melbourne (GMT+11:00)
		// Pacific/Nauru : offset: '+12:00' -  Nauru (GMT+12:00)
		// Pacific/Auckland : offset: '+13:00' -  Auckland (GMT+13:00)
		// Pacific/Kiritimati : offset: '+14:00' -  Kiritimati (GMT+14:00)



?>