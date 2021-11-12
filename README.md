![plot](https://i.postimg.cc/SxMR5kzG/based-intro.png)

Based - is the ultimate PHP search engine script that relies on Google Programmable Search (formerly Google CSE) to offer certain variation of search results without the need of any API keys. By default, 6 different engines are pre-built, Web, Images, Videos, News, Torrents and Subtitles. But with Based, the possibilities are endless, as you can literally search any specific portions of the web. Using the Google CSE Dashboard you can create your own search engines, that may search a topic that you prefer. It enriches the search result page with Rich Information Card powered by the DuckDuckGo Instant Answer API. It even has same site local instant answer support for various types of queries.

Based not only provides the search results, it displays them in an elegant and modern way, that is pleasant to the visitors. From the fully responsive layout to the full AJAX navigation support, Based speaks a design language inspired by a lot of search engines. That's why all the modern features like, Dark Mode and RTL support is built in.

*IMPORTANT, Search results not working all of a sudden?*

If your search engines are not showing any results, download to the latest update and at the root you will find a file named "based-engines-fix.sql". Import that file to your current installation's database. It will reset the engines with new default values.

Or you can manually run this SQL query:
``TRUNCATE `based_engines`;
INSERT INTO `based_engines` VALUES (1,'Web','68c42d53085561644',0,0,0,0,1,1601037982,1602951182),(2,'Images','954a56c1e00db57aa',1,0,0,0,2,1601038370,1602908385),(3,'Videos','e403897ed3d957745',0,1,0,0,3,1601117187,1602908385),(4,'News','b16521454a1884f6a',0,1,0,0,4,1601900374,1602908385),(5,'Torrents','6ff7034d0894868ee',0,0,0,0,5,1601900398,1602908385),(6,'Subtitles','93314d2add702dbab',0,0,1,0,6,1601900422,1602908385);
``
