<?php


function getSetting($settingname = 'sitename'){
    return \App\SiteSetting::where('namesetting' , $settingname)->get()[0]->value;
}

function checkIfImageIsexist($imageName , $imagepath = '/public/website/bu_images/' , $url = '/website/bu_images/'){

    if ($imageName != ''){

        $path = base_path().$imagepath.$imageName;

        if(file_exists($path)){
            return \Illuminate\Support\Facades\Request::root().$url.$imageName;
        }
    }
        return getSetting('no_image');

}
function uploadImage($request , $path = '/public/website/bu_images/' , $width = '500' , $height = '362',$daleteFileWithName =''){

    $dim = getimagesize($request);
//    if($dim[0] > $width || $dim[1] > $height){
//        return false;
//    }
    $fileName = $request->getClientOriginalName();
    $request->move(base_path().$path,$fileName);
    if($width = '500' && $height = '362'){
        $thumbpath = base_path().'/public/website/thumb/';
        $thumbpathNew = $thumbpath.$fileName;
        \Intervention\Image\Facades\Image::make(base_path().$path.'/'.$fileName)->resize('500','362')->save($thumbpathNew,100);
        if($daleteFileWithName !=''){
            deleteImage($thumbpath.'/'.$daleteFileWithName);
        }
    }
    if($daleteFileWithName !=''){
        deleteImage(base_path().$path.'/'.$daleteFileWithName);
    }
    return $fileName;
}

function deleteImage($daleteFileWithName){
    if(file_exists($daleteFileWithName)){
        \Illuminate\Support\Facades\File::delete($daleteFileWithName);
    }
}


function bu_type(){
    $array = [
        'شقة',
        'فيلا',
        'شاليه'
    ];
    return $array;
}

function bu_rent(){
    $array = [
        'تمليك',
        'إيجار',
    ];
    return $array;
}

function bu_status(){
    $array = [
        'غير مفعل',
        'مفعل',
    ];
    return $array;
}

function bu_rooms(){
    $array = [];
    for($i=2 ; $i<=40 ; $i++){
        $array[$i] = $i;
    }
    return $array;
}

function searchField(){
    return [
        'bu_price' => ' سعر العقار ',
        'bu_square' => ' مساحة العقار ',
        'bu_rooms' => ' عدد الغرف ',
        'bu_type' => ' نوع العقار ',
        'bu_place' => ' منطقة العقار ',
        'bu_rent' => ' نوع العملية ',
        'bu_status' => ' حالة العقار ',
        'bu_price_from' => ' سعر العقار من ',
        'bu_price_to' => ' سعر العقار إلي ',
    ];
}

function contact(){
    return [
        '1' => 'إعجاب',
        '2' => 'مشكلة',
        '3' => 'إقتراح',
        '4' => 'إستفسار',
    ];
}





function bu_place(){

return  [
    "" => "إختر المنطقة، المدينة أو المحافظة",
    "505" => "6 أكتوبر",
    "517" => "الواحات البحرية",
    "485" => "الأسكندرية",
    "487" => "أسيوط",
    "488" => "أسوان",
    "490" => "بني سيف",
    "489" => "البحيرة",
    "486" => "القاهرة",
    "491" => "الدقهلية",
    "492" => "دمياط",
    "493" => "الفيوم",
    "494" => "الغربية",
    "495" => "الجيزة",
    "496" => "حلون",
    "512" => "الإسماعيلية",
    "498" => "كفر الشيخ",
    "499" => "الأقصر",
    "502" => "مرسي مطروح",
    "501" => "المنيا",
    "500" => "المنوفية",
    "504" => "الوادي الجديد",
    "503" => "الساحل الشمالي",
    "516" => "الواحات",
    "506" => "بورسعيد",
    "507" => "القليوبية",
    "508" => "قنا",
    "509" => "البحر الأحمر",
    "511" => "الشرقية",
    "513" => "سيناء",
    "510" => "سوهاج",
    "514" => "شمال أسوان",
    "515" => "السويس",
    "518" => "التجمع الخامس",
    ];
}


//function bu_place(){
//    return [
//        "" => "الرجاء الاختيار...",
//        "566" => "Ain Shams",
//        "1310" => "Ain Shams-Ahmed Esmat",
//        "1450" => "Ain Shams-Al Naam",
//        "1446" => "Ain Shams-El Zahraa City",
//        "1448" => "Ain Shams-Ibrahim Abd El-Razik",
//        "1451" => "Ain Shams-Mansheya El-Tahrir",
//        "1449" => "Ain Shams-Mostafa Hafez",
//        "563" => "Al Matareya",
//        "1229" => "Al Rehab 1",
//        "1289" => "Al Rehab 2",
//        "1273" => "Al Sad Al Aali Cairo",
//        "564" => "Al Salam City",
//        "581" => "Al Sawah",
//        "553" => "Al Zeitoun",
//        "1437" => "Al Zeitoun-Ibn Al Hakam",
//        "1308" => "Al Zeitoun-Ibn Sendar",
//        "1435" => "Al Zeitoun-Salim Al Awal",
//        "1436" => "Al Zeitoun-Toman Bai",
//        "866" => "Amiria",
//        "584" => "Badr City",
//        "1464" => "Badr City-Badr City Industrial Area",
//        "867" => "Basateen",
//        "1420" => "Basateen-Al Sad Al Aali",
//        "1419" => "Basateen-Ber Om Soultan",
//        "1418" => "Basateen-Fayda Kamel",
//        "1421" => "Basateen-Mazraet Al Baet",
//        "571" => "Dar Al Salam",
//        "1353" => "Dar Al Salam-Al Gezira",
//        "1352" => "Dar Al Salam-El Mala\'a",
//        "583" => "Down Town",
//        "1373" => "Down Town-Abdeen",
//        "1372" => "Down Town-Bab al-Louq",
//        "1375" => "Down Town-El Azbakeya",
//        "1374" => "Down Town-El Esaaf",
//        "1297" => "Down Town-Tahrir Square",
//        "1388" => "DownTown-Abaseya",
//        "1383" => "DownTown-Al Ataba",
//        "1392" => "DownTown-Al Azhar",
//        "1389" => "DownTown-Al Daher",
//        "1390" => "DownTown-Al Moski",
//        "1378" => "DownTown-Al Sabtia",
//        "1391" => "DownTown-Al Sharabiyah",
//        "1393" => "DownTown-Al-Hussein",
//        "1385" => "DownTown-Bab El Shaeria",
//        "1387" => "DownTown-Boulak Abo el Eila",
//        "1377" => "DownTown-Boulaq Abo Elela",
//        "1381" => "DownTown-Cornish Al Nile",
//        "1395" => "DownTown-El Darasa",
//        "1380" => "DownTown-El Fagala",
//        "1394" => "DownTown-El Gamalia",
//        "1384" => "DownTown-El Opera",
//        "1386" => "DownTown-Ghamrah",
//        "1382" => "DownTown-Maspero",
//        "1379" => "DownTown-Ramsis",
//        "1497" => "El Marg-Berket Al Hag",
//        "1494" => "El Marg-EL knesa w El Gameaa",
//        "1493" => "El Marg-El-Rashah",
//        "1496" => "El Marg-Kafr El-Shorafa",
//        "1495" => "El Marg-Mosset Al Zakah",
//        "1180" => "El Shorouk - 3rd district",
//        "1130" => "El Shorouk - 7th district",
//        "1124" => "El Shorouk - 8th district",
//        "1116" => "El Shorouk - 9th district",
//        "1146" => "El Shorouk 5th district",
//        "1137" => "El Shorouk 6th district",
//        "1218" => "El Shorouk Al Hay Al Awal",
//        "1197" => "El Shorouk Al Hay Al Thany",
//        "1248" => "El Shorouk Eskan Al Shabab",
//        "1288" => "El Shorouk Family Housing",
//        "1237" => "El Shorouk Future City",
//        "1160" => "El Shorouk- 4th district",
//        "1491" => "El Shrouk-Cairo Suez Desert Rd",
//        "1492" => "El Shrouk-New Heliopolis City",
//        "870" => "El Tahrir",
//        "1062" => "El-Zawia El-Hamra",
//        "1068" => "Elsayeda Aisha",
//        "1294" => "Ezbat El-Nakhl",
//        "1077" => "Ezbet El-nakhl",
//        "1034" => "Ezbt Elhagana",
//        "1079" => "Gesr Al Suez",
//        "1510" => "Gesr Al Suez-Al Togareen buildings",
//        "1508" => "Gesr Al Suez-Badr Park",
//        "1503" => "Gesr Al Suez-El herafieen",
//        "1506" => "Gesr Al Suez-El-Zohour City",
//        "1505" => "Gesr Al Suez-Gamal Abdelnaser",
//        "1507" => "Gesr Al Suez-Qebaa City",
//        "1509" => "Gesr Al Suez-Souk El Canal",
//        "1504" => "Gesr Al Suez-Taksem Omar Ibn El-Khattab",
//        "1472" => "Hadayek Al Qobah-Al Sheikh Al Babli",
//        "1514" => "Hadayek Al Qobah-El-Khalig El-Masry",
//        "1467" => "Hadayek Al Qobah-El-Shaikh Ghorab",
//        "1468" => "Hadayek Al Qobah-Kobry El Qobba",
//        "1465" => "Hadayek Al Qobah-Masr and El Swdan",
//        "1469" => "Hadayek Al Qobah-Saraya Al Koba",
//        "1470" => "Hadayek Al Qobah-Sekat Al Waili",
//        "1471" => "Hadayek Al Qobah-Wali Al Ahd",
//        "1063" => "Hadayek Helwan",
//        "1064" => "Hadayek Maadi",
//        "1458" => "Heliopolis- Al-Ismailia Square",
//        "1486" => "Heliopolis-Abd El-Hameed Badawi",
//        "1304" => "Heliopolis-Al Mahkama Square",
//        "1460" => "Heliopolis-Almaza",
//        "1483" => "Heliopolis-Almoltaka Alarabi",
//        "1296" => "Heliopolis-Ard El-Golf",
//        "1455" => "Heliopolis-Cairo Airport",
//        "1306" => "Heliopolis-El Obour Buildings",
//        "1462" => "Heliopolis-El Oroba",
//        "1461" => "Heliopolis-El-Higaz Square",
//        "1463" => "Heliopolis-El-Thawra Street",
//        "1298" => "Heliopolis-Masaken Sheraton",
//        "1489" => "Heliopolis-Masr LEl Tiaran buildings",
//        "1484" => "Heliopolis-Misr LelTameer",
//        "1490" => "Heliopolis-Mohammed Kamel Hussei",
//        "1487" => "Heliopolis-New Nozha",
//        "1459" => "Heliopolis-Roxy Square",
//        "1457" => "Heliopolis-Saint Fatima Square",
//        "1485" => "Heliopolis-Saqr Korayesh Sheraton",
//        "1488" => "Heliopolis-Taha Hussen Axis",
//        "1456" => "Heliopolis-Triumph Square",
//        "871" => "Helmeya",
//        "1035" => "Helmiet Elzaitoun",
//        "574" => "Helwan",
//        "1357" => "Helwan-15th of May City",
//        "1358" => "Helwan-Atlas",
//        "1362" => "Helwan-El Moazafen City",
//        "1361" => "Helwan-El Shams City",
//        "1360" => "Helwan-Helwan American project",
//        "1359" => "Helwan-Rael",
//        "1363" => "Helwan-Wadi Houf",
//        "1078" => "Kablat",
//        "1440" => "Katamiah-Al Fursan City",
//        "1439" => "Katamiah-Baron City",
//        "1445" => "Katamiah-Bavaria Town",
//        "1441" => "Katamiah-Ebad El-Rahman Katamya",
//        "1442" => "Katamiah-Maadi Grand City",
//        "1443" => "Katamiah-Palm City Katamya",
//        "1438" => "Katamiah-Sama Tower",
//        "1444" => "Katamiah-Tabarak City",
//        "1066" => "Kozzika",
//        "1430" => "Maadi- Taqseem Laselky",
//        "1427" => "Maadi-Ahmed Zaki",
//        "1342" => "Maadi-Becho American City",
//        "1429" => "Maadi-El Gazaer Square",
//        "1426" => "Maadi-Hadayek El Maadi",
//        "1428" => "Maadi-Hassanen Desoki",
//        "1343" => "Maadi-Maadi Degla",
//        "1346" => "Maadi-Maadi Saqr Qoraish",
//        "1348" => "Maadi-Mearaag Elowy",
//        "1347" => "Maadi-Meraag Sofly",
//        "1305" => "Maadi-New Maadi",
//        "1345" => "Maadi-Sakanat El Maadi",
//        "1341" => "Maadi-Zahraa Al Maadi",
//        "858" => "Madinty",
//        "1329" => "Manial Al Rodah-Abdo Basha",
//        "1331" => "Manial Al Rodah-El Manial",
//        "1330" => "Manial Al Rodah-El Roda",
//        "585" => "Mansheyet Naser",
//        "873" => "Misr El-Kadima",
//        "1424" => "Misr El-Kadima-Amr Ibn El-Aas",
//        "1422" => "Misr El-Kadima-El-Malek El-Saleh",
//        "1423" => "Misr El-Kadima-Fustat",
//        "1425" => "Misr El-Kadima-Zahraa Masr El Kadima",
//        "570" => "Mokattam",
//        "1454" => "Mokattam-Asmarat Heights Compound",
//        "1452" => "Mokattam-El-Hadaba El-Wosta",
//        "1453" => "Mokattam-Uptown Cairo",
//        "558" => "Moustorod",
//        "1174" => "Nasr City Al Hay Al Asher",
//        "1144" => "Nasr City Al Manteqah Al Oula",
//        "1136" => "Nasr City Al Manteqah Al Sadesah",
//        "1128" => "Nasr City Al Manteqah Al Thamenah",
//        "1207" => "Nasr City El Hay El Tamen",
//        "1295" => "Nasr City Nasr City El Hay El Tamen",
//        "1432" => "Nasr City-Al TOB Al Ramli",
//        "1433" => "Nasr City-Al Wafaa W Al Amal City",
//        "1434" => "Nasr City-Waha District",
//        "1431" => "Nasr City-Zahraa Nasr City",
//        "1482" => "New Cairo- New Cairo El-Diplomaseen",
//        "1477" => "New Cairo-1st Settlement",
//        "1475" => "New Cairo-3rd Settlement",
//        "1300" => "New Cairo-5th Settlement",
//        "1476" => "New Cairo-Arabella",
//        "1479" => "New Cairo-Mirage City",
//        "1473" => "New Cairo-North 90,st",
//        "1481" => "New Cairo-North investors",
//        "1474" => "New Cairo-South 90,st",
//        "1480" => "New Cairo-South investors",
//        "1478" => "New Cairo-South of Police Academy",
//        "1217" => "New El-Marg",
//        "1067" => "Rod El-Farag",
//        "877" => "Sayeda Naffisa",
//        "1376" => "Sayeda Naffisa-Zenhom",
//        "556" => "Sayeda Zeinab",
//        "1337" => "Sayeda Zeinab-Al Kalaa\'",
//        "1339" => "Sayeda Zeinab-Al Kasr Al Einy",
//        "1338" => "Sayeda Zeinab-El Helmeya El Gedida",
//        "1332" => "Sayeda Zeinab-El Khodary",
//        "1334" => "Sayeda Zeinab-El Nasrya",
//        "1340" => "Sayeda Zeinab-Garden City",
//        "1336" => "Sayeda Zeinab-Magles Al Shaab",
//        "1335" => "Sayeda Zeinab-Magles Eloma",
//        "1333" => "Sayeda Zeinab-kaleat Elkabsh",
//        "1349" => "Shubra-El Khalafawy",
//        "1350" => "Shubra-Masarra",
//        "1351" => "Shubra-Rod El Farag",
//        "565" => "Tebin",
//        "1065" => "Tura-Elbalad",
//        "586" => "Zamalek",
//    ];
//}
