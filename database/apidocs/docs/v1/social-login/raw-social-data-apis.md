Raw Social Data API
=====


-------

This documentation describes the behavior/implementation of our Raw API. The Raw API is used to get additional data points from ID providers that are currently not part of the LoginRadius data feed - (https://www.loginradius.com/datapoints). The response data with this API come directly from the ID providers (Facebook, Google, Twitter, etc.), so they will not be normalized by LoginRadius.

The Raw API is used to get raw social data from the user’s social account after authentication. The social data will be retrieved via oAuth and OpenID Connect protocols. However, the format of the data points that are being fetched would vary for each provider. This data is not normalized into LoginRadius’ standard data format.

## User Profile data

**End-point:** https://api.loginradius.com/api/v2/userprofile/raw?access_token=:access_token

The UserProfile API will fetch raw UserProfile data from the social provider.

**Supported Providers:** All
######Facebook:
```
{
  "id": "100000000000000",
  "first_name": "Jane",
  "last_name": "Doe",
  "name": "Jane Doe",
  "link": "https://www.facebook.com/app_scoped_user_id/100000000000000/",
  "location": {
    "id": "1000000000000",
    "name": "xxxxxx"
  },
```
######Twitter:
```
{
  "id": 00000000,
  "id_str": "00000000",
  "name": "Jane Doe",
  "screen_name": "JaneDoe",
  "location": "Vancouver",
  "description": "xxxxxxxxx",
  "url": "http://t.co/xxxxxx"
}
```


##Album

**End-point:** https://api.loginradius.com/api/v2/album/raw?access_token=:access_token

This API returns the photo albums associated with the passed access token's Social Profile in the raw form.

**Supported Providers:** Facebook, Google, Live, Vkontakte
######Facebook
```
"{\"data\":[{\"count\":3,\"created_time\":\"2013-09-28T06:53:35+0000\",\"updated_time\":\"2016-07-19T13:20:00+0000\",\"cover_photo\":{\"created_time\":\"2016-01-12T07:44:20+0000\",\"name\":\"sdfssfdsfdsfdsfs\",\"id\":\"0000000\"},\"from\":{\"name\":\"xxxxxxx\",\"id\":\"000000000\"},\"id\":\"0000000\",\"link\":\"https:\\/\\/www.facebook.com\\/album.php?fbid=0000000&id=11111111111&aid=22222\",\"name\":\"Timeline Photos\",\"type\":\"wall\"}
```

##Audio

**End-point:** https://api.loginradius.com/api/v2/audio/raw?access_token=:access_token

The Audio API is used to get raw audio files data from the user’s social account.

**Supported Providers:** Live, Vkontakte
######Vkontakte

```
"{\"response\":{\"count\":0,\"items\":[{\"id\":\"00000\",\"photo\":\"http:\\/\\/vk.com\\/images\\/camera_00.png\",\"name\":\"xxx\",\"name_gen\":\"xxxx\"}]}}"
```

##Check In

**End-point:** https://api.loginradius.com/api/v2/checkin/raw?access_token=:access_token

The Check In API is used to get raw check Ins data from the user’s social account.

**Supported Providers:** Facebook, Foursquare, Vkontakte
######Facebook
```
{\"data\":[{\"id\":\"0000000\",\"place\":{\"id\":\"00000000\",\"location\":{\"city\":\"Vancouver\",\"country\":\"Canada\",\"latitude\":27.264865124,\"longitude\":75.8347661},\"name\":\"xxxxxx, xxxxx,xxxx\"},\"created_time\":\"2016-11-11T08:42:44+0000\"}
```


##Company

**End-point:** https://api.loginradius.com/api/v2/company/raw?access_token=:access_token

The Company API is used to get the raw companies data from the user’s social account.

**Supported Providers:** Facebook, LinkedIn

######Facebook
```
"{\"data\":[{\"id\":\"6191007822\",\"name\":\"LinkedIn\",\"about\":\"Connecting the world's professionals to help make them more productive and successful.\",\"category\":\"Website\"},{\"id\":\"581592201924426\",\"name\":\"S V L F \\u039b\",\"about\":\"S V L F \\u039b : \\nis a producer and a dj of electronic BVSS music, dub & trvp. \\nSoundcloud.com\\/svlfa\\nwww.soundcloud.com\\/thebiyfradio\\nContact : 09589553773\",\"category\":\"Artist\"}"
```

##Contact

**End-point:** https://api.loginradius.com/api/v2/contact/raw?access_token=:access_token

The Contact API is used to get raw contacts/friends/connections data from the user’s social account.

**Supported Providers:** Facebook, Foursquare, Google, LinkedIn, Live, Twitter, Vkontakte, Yahoo
######Facebook
```
"{\"data\":[{\"gender\":\"female\",\"name\":\"xxxxx\",\"id\":\"731218840376074\"}],\"paging\":{\"cursors\":{\"before\":\"guigw94430r044fe9FYYFR89bdggfdg\",\"after\":\"dbfsluie33333HFEIHSUFU98668igerrrr\"}},\"summary\":{\"total_count\":12}}"
```
######Twitter
```
{\"users\":[{\"id\":765943723347873793,\"id_str\":\"765943723347873793\",
\"name\":\"Antima Jain\",\"screen_name\":\"AntimaJain15\",\"location\":\"\",\"url\":null,
\"description\":\"\",\"protected\":false,\"followers_count\":4,\"friends_count\":32,
\"listed_count\":0,\"created_at\":\"Wed Aug 17 16:09:48 +0000 2016\",\"favourites_count\":0,
\"utc_offset\":null,\"time_zone\":null,\"geo_enabled\":false,\"verified\":false,
\"statuses_count\":0,\"lang\":\"en\",\"contributors_enabled\":false,\"is_translator\":false,\
"is_translation_enabled\":false,\"profile_background_color\":\"F5F8FA\",
\"profile_background_image_url\":null,\"profile_background_image_url_https\":null,
\"profile_background_tile\":false,\"profile_image_url\":\"http:\\/\\/abs.twimg.com\\/sticky\\
/default_profile_images\\/default_profile_2_normal.png\",\"profile_image_url_https\":
\"https:\\/\\/abs.twimg.com\\/sticky\\/default_profile_images\\/default_profile_2_normal.png\
",\"profile_link_color\":\"1DA1F2\",\"profile_sidebar_border_color\":\"C0DEED\",
\"profile_sidebar_fill_color\":\"DDEEF6\",\"profile_text_color\":\"333333\",
\"profile_use_background_image\":true,\"has_extended_profile\":false,\"default_profile\":true,
\"default_profile_image\":true,\"following\":false,\"live_following\":false,\
"follow_request_sent\":false,\"notifications\":false,\"muting\":false,\"blocking\":false,\
"blocked_by\":false,\"translator_type\":\"none\"}
```

##Event

**End-point:** https://api.loginradius.com/api/v2/event/raw?access_token=:access_token

The Event API is used to get the raw event data from the user’s social account.

**Supported Providers: **Facebook, Live
######Facebook
```
"{\"data\":[{\"description\":\"xxxxxxx\\n xxxxx company\",\"name\":\"khel\",\"start_time\":\"2016-11-11T15:00:00+0530\",\"updated_time\":\"2016-11-11T08:48:01+0000\",\"owner\":{\"name\":\"xxxxxxx\",\"id\":\"111111111\"},\"place\":{\"name\":\"Jjjjjj\",\"location\":{\"city\":\"Vancouver\",\"country\":\"Canada\",\"latitude\":18.876962558336,\"longitude\":65.809526636651,\"street\":\"xxxxx\",\"zip\":\"1111\"},\"id\":\"2222222\"},\"id\":\"3333333\",\"rsvp_status\":\"attending\"},
```

##Following

**End-point:** https://api.loginradius.com/api/v2/following/raw?access_token=:access_token

The Following API is used to get the raw following user list from the user’s social account.

**Supported Providers:** Twitter
######Twitter
```
"{\"users\":[{\"id\":87118217,\"id_str\":\"87118217\",\"name\":\"Shane Warne\",\"screen_name\":\"ShaneWarne\",\"location\":\"London & Melbourne \",\"url\":\"http:\\/\\/www.shanewarne.com\",\"description\":\"A proud father to 3 wonderful teenagers. Played cricket. Now cricket commentary. Cricket Superstars founder. Poker player & lover of 80's music ! Single\",\"protected\":false,\"followers_count\":2846819,\"friends_count\":380,\"listed_count\":8851,\"created_at\":\"Tue Nov 03 05:46:36 +0000 2009\",\"favourites_count\":8653,\"utc_offset\":39600,\"time_zone\":\"Melbourne\",\"geo_enabled\":true,\"verified\":true,\"statuses_count\":16264,\"lang\":\"en\",\"contributors_enabled\":false,\"is_translator\":false,\"is_translation_enabled\":false,\"profile_background_color\":\"131516\",\"profile_background_image_url\":\"http:\\/\\/pbs.twimg.com\\/profile_background_images\\/81171063\\/twitter-background-photoshop_tSHANE.gif\",\"profile_background_image_url_https\":\"https:\\/\\/pbs.twimg.com\\/profile_background_images\\/81171063\\/twitter-background-photoshop_tSHANE.gif\",\"profile_background_tile\":false,\"profile_image_url\":\"http:\\/\\/pbs.twimg.com\\/profile_images\\/782623343891603456\\/egYMl1Tp_normal.jpg\",\"profile_image_url_https\":\"https:\\/\\/pbs.twimg.com\\/profile_images\\/782623343891603456\\/egYMl1Tp_normal.jpg\",\"profile_banner_url\":\"https:\\/\\/pbs.twimg.com\\/profile_banners\\/87118217\\/1459235124\",\"profile_link_color\":\"009999\",\"profile_sidebar_border_color\":\"EEEEEE\",\"profile_sidebar_fill_color\":\"EFEFEF\",\"profile_text_color\":\"333333\",\"profile_use_background_image\":false,\"has_extended_profile\":false,\"default_profile\":false,\"default_profile_image\":false,\"following\":true,\"live_following\":false,\"follow_request_sent\":false,\"notifications\":false,\"muting\":false,\"blocking\":false,\"blocked_by\":false,\"translator_type\":\"none\"}"
```
##Group

**End-point:** https://api.loginradius.com/api/v2/group/raw?access_token=:access_token

The Group API is used to get group data from the user’s social account.

**Supported Providers:** Facebook, Vkontakte

######Facebook
```
"{\"data\":[{\"id\":\"00000000000\",\"name\":\"xxxxxx\",\"email\":\"222222\\u000groups.facebook.com\",\"icon\":\"https:\\/\\/static.xx.fbcdn.net\\/rsrc.php\\/v3\\/yJ\\/r\\/sssss33ed.png\"}
```

## Like

**End-point:** https://api.loginradius.com/api/v2/like/raw?access_token=:access_token

Get likes raw data from the user’s social account.

**Supported Providers:** Facebook

######Facebook
```
"{\"data\":[{\"id\":\"6191007822\",\"name\":\"LinkedIn\",\"link\":\"https:\\/\\/www.facebook.com\\/LinkedIn\\/\",\"website\":\"www.linkedin.com\",\"description\":\"Connecting the world's professionals to make them more productive and successful. \",\"cover\":{\"cover_id\":\"10153962206717823\",\"offset_x\":0,\"offset_y\":0,\"source\":\"https:\\/\\/scontent.xx.fbcdn.net\\/v\\/t1.0-9\\/s720x720\\/999995_1015717823_166562731_n.jpg?oh=72321a031f5185ad5ed2f98779c30210&oe=58F63DC7\",\"id\":\"101539000000\"},\"talking_about_count\":9437,\"can_post\":false,\"category\":\"Website\",\"created_time\":\"2014-10-06T13:07:50+0000\"}
```

##Mention

**End-point:** https://api.loginradius.com/api/v2/mention/raw?access_token=:access_token

The Mention API is used to get raw mentions data from the user’s social account.

**Supported Providers:** Twitter
######Twitter
```
"[{\"created_at\":\"Fri Nov 27 07:08:03 +0000 2015\",\"id\":0000,\"id_str\":\"0000\",\"text\":\"@xxx Here\\u2019s your updated grid. https:\\/\\/t.co\\/BmyXVT6gtq\",\"truncated\":false,\"entities\":{\"hashtags\":[],\"symbols\":[],\"user_mentions\":[{\"screen_name\":\"xxx\",\"name\":\"xxx\",\"id\":000,\"id_str\":\"000\",\"indices\":[0,12]}],\"urls\":[],\"media\":[{\"id\":0000,\"id_str\":\"000\",\"indices\":[51,74],\"media_url\":\"http:\\/\\/pbs.twimg.com\\/media\\/VAAAlJzs.png\",\"media_url_https\":\"https:\\/\\/pbs.twimg.com\\/media\\/LVAAAlJzs.png\",\"url\":\"https:\\/\\/t.co\\/BmyXVT6gtq\",\"display_url\":\"pic.twitter.com\\/BmyXVT6gtq\",\"expanded_url\":\"https:\\/\\/twitter.com\\/ESPNscorecard\\/status\\/000\\/photo\\/1\",\"type\":\"photo\",\"sizes\":{\"small\":{\"w\":340,\"h\":170,\"resize\":\"fit\"},\"thumb\":{\"w\":150,\"h\":150,\"resize\":\"crop\"},\"large\":{\"w\":900,\"h\":450,\"resize\":\"fit\"},\"medium\":{\"w\":600,\"h\":300,\"resize\":\"fit\"}}}]},\"extended_entities\":{\"media\":[{\"id\":0000,\"id_str\":\"0000\",\"indices\":[51,74],\"media_url\":\"http:\\/\\/pbs.twimg.com\\/media\\/AAlJzs.png\",\"media_url_https\":\"https:\\/\\/pbs.twimg.com\\/media\\/AlJzs.png\",\"url\":\"https:\\/\\/t.co\\/BmyXVT6gtq\",\"display_url\":\"pic.twitter.com\\/BmyXVT6gtq\",\"expanded_url\":\"https:\\/\\/twitter.com\\/ESPNscorecard\\/status\\/0000\\/photo\\/1\",\"type\":\"photo\",\"sizes\":{\"small\":{\"w\":340,\"h\":170,\"resize\":\"fit\"},\"thumb\":{\"w\":150,\"h\":150,\"resize\":\"crop\"},\"large\":{\"w\":900,\"h\":450,\"resize\":\"fit\"},\"medium\":{\"w\":600,\"h\":300,\"resize\":\"fit\"}}}]},\"source\":\"\\u003ca href=\"http:\\/\\/localhost.com\" rel=\"nofollow\"\\u003eCI-SI Social\\u003c\\/a\\u003e\",\"in_reply_to_status_id\":0000,\"in_reply_to_status_id_str\":\"00000\",\"in_reply_to_user_id\":0000,\"in_reply_to_user_id_str\":\"0000\",\"in_reply_to_screen_name\":\"xxx\",\"user\":{\"id\":0000,\"id_str\":\"0000\",\"name\":\"ESPNcricinfo scores\",\"screen_name\":\"ESPNscorecard\",\"location\":\"\",\"description\":\"Cricket score alerts from @ESPNcricinfo for all wickets, milestones, 100-run stands, team 100s, and final scores in Tests, ODIs, T20Is. Follow the scores here.\",\"url\":\"http:\\/\\/t.co\\/suKnazWzVh\",\"entities\":{\"url\":{\"urls\":[{\"url\":\"http:\\/\\/t.co\\/suKnazWzVh\",\"expanded_url\":\"http:\\/\\/www.espncricinfo.com\",\"display_url\":\"espncricinfo.com\",\"indices\":[0,22]}]},\"description\":{\"urls\":[]}},\"protected\":false,\"followers_count\":498196,\"friends_count\":0,\"listed_count\":195,
```
##Page

**End-point:** `https://api.loginradius.com/api/v2/page/raw?access_token=:access_token&pagename=:pagename`

The Page API is used to get the raw page data from the user’s social account.

**Supported Providers:** Facebook, LinkedIn

######Facebook
```
{\"about\":\"xxxxxx\",\"awards\":\"ffff\\ffff\",\"category\":\"f\",\"checkins\":40,\"description\":\"xxxxxx\",\"founded\":\"2012\",\"is_published\":true,\"location\":{\"city\":\"Vancouver\",\"country\":\"Canada\",\"state\":\"BC\",\"street\":\"200-1281 W Georgia Street\",\"zip\":\"V6E 3J7\"},\"mission\":\"xxxxxx\",\"phone\":\"649646\",\"release_date\":\"June 12, 2011\",\"talking_about_count\":7,\"website\":\"www.abc.com\",\"id\":\"111111\",\"name\":\"abc\",\"link\":\"https:\\/\\/www.facebook.com\\/abc\\/\",\"likes\":{\"data\":[{\"name\":\"xxxx\",\"id\":\"00000\"},{\"name\":\"Home Business Success Network\",\"id\":\"0000\"},{\"name\":\"vvvvvv\",\"id\":\"000000\"},{\"name\":\"HubSpot\",\"id\":\"00000\"},{\"name\":\"Hootsuite\",\"id\":\"00000\"}],\"paging\":{\"cursors\":{\"before\":\"jhvfihig\",\"after\":\"hjvjvjh\"}}},\"cover\":{\"cover_id\":\"55555\",\"offset_x\":0,\"offset_y\":0,\"source\":\"https:\\/\\/scontent.xx.fbcdn.net\\/v\\/t1.0-9\\/s720x720\\/8768_971710005_7853965_n.png?oh=huyjg&oe=mnk\",\"id\":\"3555\"},\"picture\":{\"data\":{\"is_silhouette\":false,\"url\":\"https:\\/\\/scontent.xx.fbcdn.net\\/v\\/t1.0-1\\/p50x50\\/1055_71121_533_n.png?oh=uhiuh&oe=54645\"}},\"username\":\"loginradius\"}"
```

##Photo

**End-point:** https://api.loginradius.com/api/v2/photo/raw?access_token=:access_token&albumid=:albumid

The Photo API is used to get raw photo data from the user’s social account.

**Supported Providers:** Facebook, Foursquare, Google, Live, Vkontakte
######Facebook
```
"{\"data\":[{\"album\":{\"created_time\":\"2013-09-28T06:53:35+0000\",\"name\":\"Timeline Photos\",\"id\":\"000000\"},\"from\":{\"name\":\"ccccs\",\"id\":\"2222222\"},\"height\":362,\"icon\":\"https:\\/\\/static.xx.fbcdn.net\\/rsrc.php\\/v3\\/yz\\/r\\/kjiugi.gif\",\"created_time\":\"2016-01-12T07:44:20+0000\",\"id\":\"000000\",\"images\":[{\"height\":362,\"source\":\"https:\\/\\/scontent.xx.fbcdn.net\\/v\\/t1.0-9\\/688_1741494_10762206_n.jpg?oh=mnbit9uij8hn=58B\",\"width\":640},{\"height\":320,\"source\":\"https:\\/\\/scontent.xx.fbcdn.net\\/v\\/t1.0-0\\/p320x320\\/1288_1749721494_10762206_n.jpg?oh=56a5a9f09a44&oe=58C0\",\"width\":565}"
```

##Post

**End-point:** https://api.loginradius.com/api/v2/post/raw?access_token=:access_token

Get post message data from the user’s social account.

**Supported Providers:** Facebook

######Facebook
```
"{\"data\":[{\"id\":\"1882439_18908\",\"name\":\"Hello\",\"from\":{\"name\":\"ccccc\",\"id\":\"1000039\"},\"created_time\":\"2016-12-02T08:55:54+0000\",\"updated_time\":\"2016-12-02T08:55:54+0000\",\"message\":\"vvvv\",\"picture\":\"https:\\/\\/external.xx.fbcdn.net\\/safe_image.php?d=AQB_S1-gl&w=130&h=130&url=http\\u00A\\u2F\\uwww.loginradius.com\\u002wp-content\\u052Fuploads\\u2F2015\\uF04\\uFamplify-marketing-roi.png&cfs=1\",\"type\":\"link\"}"
```

##Status Fetching

**End-point:** https://api.loginradius.com/api/v2/status/raw?access_token=:access_token

The Status API is used to get the status messages in the raw form from the user’s social account.

**Supported Providers: **Facebook, LinkedIn, Twitter, Vkontakte

######Facebook

```
"{\"data\":[{\"id\":\"18939_188708\",\"message\":\"xxx\",\"updated_time\":\"2016-12-02T08:55:54+0000\",\"created_time\":\"2016-12-02T08:55:54+0000\"},
```

######Twitter

```
{\"created_at\":\"Fri Dec 02 03:56:07 +0000 2016\",\"id\":00000,\"id_str\":
\"000\",\"text\":\"Testing\",\"truncated\":false,\"entities\":{\"hashtags\":[],
\"symbols\":[],\"user_mentions\":[],\"urls\":[]},\"source\":\"\\ca href=\"https:\\/\\
/internal-yachna.hub.loginradius.com\" rel=\"nofollow\"\\23\\00\\/a\\u003e\",
\"in_reply_to_status_id\":null,\"in_reply_to_status_id_str\":null,\"in_reply_to_user_id\":null,
\"in_reply_to_user_id_str\":null,\"in_reply_to_screen_name\":null,\"user\":{\"id\":0000,
\"id_str\":\"0000\",\"name\":\"xxxx\",\"screen_name\":\"xxxx\",\"location\"
:\"Vancouver\",\"description\":\"abc\",\"url\":\"http:\\/\\/t.co\\/aLJswnaYZ5\",\
"entities\":{\"url\":{\"urls\":[{\"url\":\"http:\\/\\/t.co\\/aLJswnaYZ5\",\"expanded_url\":\
"http:\\/\\/www.test.com\",\"display_url\":\"test.com\",\"indices\":[0,22]}]},\"description\"
:{\"urls\":[]}},\"protected\":false,\"followers_count\":8,\"friends_count\":15,\"listed_count
\":0,
```

##Video

**End-point:** https://api.loginradius.com/api/v2/video/raw?access_token=:access_token

The Video API is used to get raw video files data from the user’s social account.

**Supported Providers:** Facebook, Google, Live, Vkontakte

######Facebook
```
{\"id\":\"00000\",\"description\":\"description12\",\"picture\":\"https:\\/\\/scontent.xx.fbcdn.net\\/v\\/t15.0-10\\/s160x160\\/10_141244_1412442_21112_1074_b.jpg?oh=rer6dere&oe=55rrff\",\"source\":\"https:\\/\\/video.xx.fbcdn.net\\/v\\/t42.1790-2\\/39_141244239_244_n.mp4?efg=bilufdohdoh090u4nd\\u00253D&rl=622&vabr=346&oh=ndur9484h84h8f&oe=50\",\"embed_html\":\"\\3Ciframe src=\\\"https:\\/\\/www.facebook.com\\/video\\/embed?video_id=5555555\\\" width=\\\"320\\\" height=\\\"240\\\" frameborder=\\\"0\\\">\\u003C\\/iframe>\",\"created_time\":\"2013-09-28T09:10:50+0000\",\"updated_time\":\"2013-09-28T09:10:50+0000\",\"from\":{\"name\":\"xxxxxx\",\"id\":\"0000\"}}],\"paging\":{\"cursors\":{\"before\":\"fdfd\",\"after\":\"fdf\"}}}"

```
