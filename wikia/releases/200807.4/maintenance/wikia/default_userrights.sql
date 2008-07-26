delete from user_groups where ug_group="staff";
insert into user_groups(ug_user, ug_group) values
(/*Adi3ek*/259228,'staff'),
(/*Andrewy*/402666,'staff'),
(/*Angela*/2,'staff'),
(/*Angies*/67261,'staff'),
(/*Avatar*/349903, 'staff'),
(/*Awrigh01*/67758,'staff'),
(/*BartL*/80238,'staff'),
(/*BillK*/38903,'staff'),
(/*BladeBronson*/140142,'staff'),
(/*CatherineMunro*/108559,'staff'),
(/*Crucially*/182546,'staff'),
(/*Dmurphy*/138300,'staff'),
(/*DNL*/56870,'staff'),
(/*Eloy.wikia*/51098,'staff'),
(/*Emil*/27301,'staff'),
(/*Galezewski*/189276,'staff'),
(/*Gil*/20251,'staff'),
(/*Gorillamania*/414904,'staff'),
(/*Greg Lanz*/434625,'staff'),
(/*Inez*/51654,'staff'),
(/*Jeffrey Tierney*/181462,'staff'),
(/*Jeremie*/123457,'staff'),
(/*Jimbo Wales*/13,'staff'),
(/*Johnq*/24316,'staff'),
(/*JSharp*/39018,'staff'),
(/*KaurJmeb*/23838,'staff'),
(/*Kirkburn*/126761,'staff'),
(/*KyleH*/265264,'staff'),
(/*Lleowen*/261184,'staff'),
(/*Macbre*/119245,'staff'),
(/*Marooned*/250810,'staff'),
(/*Moli.wikia*/115748,'staff'),
(/*Pean*/66574,'staff'),
(/*Ppiotr*/60069,'staff'),
(/*Przemek wikia*/157013,'staff'),
(/*Sannse*/8,'staff'),
(/*Scarecroe*/10637, 'staff'),
(/*Tomsen*/26682, 'staff'),
(/*TOR*/23865,'staff'),
(/*Toughpigs*/10370,'staff'),
(/*Wiffle*/305670,'staff'),
(/*WikiaBot*/269919,'staff'),
(/*Yukichi*/126117,'staff'),
(/*Zuirdj*/47,'staff'),
;

delete from user_groups where ug_user in (
/*Jasonr*/1
) and ug_group="searchadmin";
insert into user_groups(ug_user, ug_group) values
(/*Jasonr*/1,'searchadmin')
;

delete from user_groups where ug_user in (
/*Greyman*/87167,
/*Jaymach*/7701,
/*Uberfuzzy*/161697
) and ug_group="janitor";
insert into user_groups(ug_user, ug_group) values
(/*Greyman*/87167,'janitor'),
(/*Jaymach*/7701,'janitor'),
(/*Uberfuzzy*/161697, 'janitor')
;

delete from user_groups where ug_user in (
/*AnnElida*/792759,
/*Bola*/126681,
/*Datrio*/57466,
/*Jnewcombe*/801589,
/*JoePlay*/171752,
/*MeatMan*/226254,
/*Merrystar*/11001,
/*Multimoog*/20290,
/*Muppets101*/77907,
/*PanSola*/12719,
/*Peteparker*/122657,
/*Rieke Hain*/26246,
/*Richard1990*/25261,
/*Splarka*/8245,
/*Tommy6*/239851,
/*Uberfuzzy*/161697
) and ug_group="helper";
insert into user_groups(ug_user, ug_group) values
(/*AnnElida*/792759,'helper'),
(/*Bola*/126681,'helper'),
(/*Datrio*/57466,'helper'),
(/*Jnewcombe*/801589,'helper'),
(/*JoePlay*/171752,'helper'),
(/*MeatMan*/226254,'helper'),
(/*Merrystar*/11001,'helper'),
(/*Muppets101*/77907,'helper'),
(/*Multimoog*/20290,'helper'),
(/*PanSola*/12719,'helper'),
(/*Peteparker*/122657, 'helper'),
(/*Rieke Hain*/26246,'helper'),
(/*Richard1990*/25261,'helper'),
(/*Splarka*/8245,'helper'),
(/*Tommy6*/239851,'helper'),
(/*Uberfuzzy*/161697, 'helper')
;

delete from user_groups where ug_user in (
/*Default*/49312,
/*WikiaBot*/269919
) and ug_group="bot";
insert into user_groups(ug_user, ug_group) values
(/*Default*/49312,'bot'),
(/*WikiaBot*/269919,'bot')
;
