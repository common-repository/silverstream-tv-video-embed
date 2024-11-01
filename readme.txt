=== Silverstream TV Video Embed ===
Tags: silverstream, silverstream tv, silverstreamtv, sstv, sstv_video, video.silverstream, video.silverstream.tv, shortcode
Contributors: silverstreamtv
Requires at least: 3.6.0
Tested up to: 6.2
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Plugin for for adding Silverstream TV Video shortcodes.


== Description ==

Adds shortcode support for embedding Silverstream TV media players. Shortcodes can be included in your posts and pages to quickly and easily embed Silverstream TV hosted content such as video, audio, live streams and presentations.

= Basic Usage =

Most basic example:
`[sstv_video media=<idstring>]`
with <idstring> substituted for the media's ID string which can be found at the end of URLs 

For example a video with this URL https://video.silverstream.tv/view/pqz4cPvk can be embedded with:
`[sstv_video media=pqz4cPvk]`

= Advanced Usage =

Several other optional attributes are supported to allow you to customise the size of the player as well as different behaviours.

| Attribute | Required | Description | Example value |
| --- | --- | --- | --- |
| media | Required | Video.Silverstream Media ID | pqz4cPvk |
| width | Optional | player width in px | 640 |
| height | Optional | player height in px, if left blank, height is calculated from aspect ratio | 360 |
| aspect_ratio | Optional | ratio between width and height | 1.7777 (16:9) |
| extra_height | Optional | additional height in px to be added after aspect ratio calculation | 120 |
| controls | Optional | Set to 0 to disable controls | 1 |
| autoplay | Optional | Set to 1 to enable autoplay  | 0 |
| loop | Optional | Set to 1 to enable looping  | 0 |
| subtitles | Optional | Set to 1 to force subtitles on  | 0 |
| hide_share | Optional | Set to 1 to hide the share button  | 0 |
| time | Optional | Start the video playing a number of seconds in rather than the start | 15 |
| js_control | Optional | Set to 1 to enable additional JavaScript controls for the player  | 0 |

An example of this might be
`[sstv_video media=pqz4cPvk width=1280 height=720 autoplay=1]`

Additionally `[sstv_presentation media=pqz4cPvk]` can be used for presentations.


== Installation ==

1. Simply press Upload Plugin on the Plugins page of your WordPress CMS and upload silverstreamtv-embed.zip 
   or unzip and upload it to the /wp-content/plugins/ directory making sure the contents are in their own silverstreamtv-embed directory within /wp-content/plugins/.
2. Then Activate it on the plugins page



== Changelog ==

= 0.0.1 =
Initial release