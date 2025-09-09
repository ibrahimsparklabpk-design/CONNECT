// JavaScript for dynamically populating states based on selected country
const statesByCountry = {
    
    Afghanistan: ["Badakhshan", "Badghis", "Baghlan", "Bamyan", "Daykundi", 
        "Farah", "Faryab", "Ghazni", "Ghor", "Helmand", 
        "Herat", "Jowzjan", "Kabul", "Kandahar", "Kapisa", 
        "Khost", "Kunar", "Laghman", "Nangarhar", "Nimroz", 
        "Nuristan", "Panjshir", "Parwan", "Samangan", "Sar-e Pol", 
        "Takhar", "Urozgan", "Wardak", "Zabul"],

        Albania: ["Berat", "Diber", "Durres", "Elbasan", "Shkoder", "Fier", "Korçë", "Tirana", "Vlorë"],
Algeria: ["Adrar", "Chlef", "Laghouat", "Oum El Bouaghi", "Batna", "Béjaïa", "Biskra", "Bordj Bou Arréridj", 
          "Tébessa", "Tlemcen", "Tiaret", "Tizi Ouzou", "Algiers", "Oran", "Annaba", "Sétif", "Saida", 
          "Skikda", "Médéa", "Mostaganem", "Relizane"],
Andorra: ["Andorra la Vella", "Escaldes-Engordany", "Encamp", "La Massana", "Ordino", "Sant Julià de Lòria"],
Angola: ["Bengo", "Benguela", "Bié", "Cabinda", "Cuando Cubango", "Cuanza Norte", "Cuanza Sul", 
         "Cuito Cuanavale", "Malanje", "Namibe", "Huambo", "Luanda", "Lunda Norte", "Lunda Sul", "Moxico"],
Antigua_and_Barbuda: ["Antigua", "Barbuda"],
Argentina: ["Buenos Aires", "Catamarca", "Chaco", "Chubut", "Córdoba", "Corrientes", "Entre Ríos", "Formosa", 
            "Jujuy", "La Pampa", "La Rioja", "Mendoza", "Misiones", "Neuquén", "Río Negro", "Salta", 
            "San Juan", "San Luis", "Santa Cruz", "Santa Fe", "Santiago del Estero", "Tierra del Fuego", "Tucumán"],
Armenia: ["Aragatsotn", "Ararat", "Armavir", "Gegharkunik", "Kotayk", "Lori", "Shirak", "Syunik", 
          "Tavush", "Vayots Dzor", "Yerevan"],
Australia: ["New South Wales", "Queensland", "South Australia", "Tasmania", "Victoria", "Western Australia", 
            "Australian Capital Territory", "Northern Territory"],
Austria: ["Burgenland", "Carinthia", "Lower Austria", "Upper Austria", "Salzburg", "Styria", "Tyrol", 
          "Vorarlberg", "Vienna"],
Azerbaijan: ["Absheron", "Ganja-Gazakh", "Lankaran", "Milik", "Mingechevir", "Nakhchivan", "Shaki-Zagatala", 
             "Sheki", "Yukhari-Goychay", "Guba-Khachmaz"],


             Bahamas: ["Abaco", "Acklins", "Berry Islands", "Bimini", "Cat Island", "Exuma", "Grand Bahama", "Harbour Island", "Long Island", "New Providence", "Ragged Island", "Rum Cay", "San Salvador"],
             Bahrain: ["Capital Governorate", "Northern Governorate", "Southern Governorate", "Muharraq Governorate", "Isa Town", "Sitra"],
             Bangladesh: ["Barisal", "Chittagong", "Dhaka", "Khulna", "Rajshahi", "Rangpur", "Sylhet"],
             Barbados: ["Christ Church", "Saint Andrew", "Saint George", "Saint James", "Saint John", "Saint Joseph", "Saint Lucy", "Saint Michael", "Saint Peter", "Saint Philip", "Saint Thomas"],
             Belarus: ["Brest Region", "Gomel Region", "Grodno Region", "Minsk Region", "Mogilev Region", "Vitebsk Region", "Minsk City"],
             Belgium: ["Antwerp", "Brabant", "Brussels-Capital Region", "East Flanders", "Flemish Brabant", "Hainaut", "Liege", "Limburg", "Namur", "Walloon Brabant", "West Flanders"],
             Belize: ["Belize District", "Cayo District", "Corozal District", "Orange Walk District", "Stann Creek District", "Toledo District"],
             Benin: ["Alibori", "Atakora", "Atlantique", "Borgou", "Collines", "Donga", "Littoral", "Monou", "Ouémé", "Plateau", "Zou"],
             Bhutan: ["Bumthang", "Chukha", "Dagana", "Gasa", "Haa", "Lhuentse", "Monggar", "Paro", "Pema Gatshel", "Samdrup Jongkhar", "Sarpang", "Thimphu", "Trashigang", "Trashiyangtse", "Wangdue Phodrang", "Zhemgang"],
             Bolivia: ["Chuquisaca", "Cochabamba", "Colcha K", "La Paz", "Oruro", "Pando", "Potosí", "Santa Cruz", "Tarija"],
             Bosnia_and_Herzegovina: ["Federation of Bosnia and Herzegovina", "Republika Srpska", "Brčko District"],
             Botswana: ["Botswana", "Central District", "Chobe District", "Ghanzi District", "Kgalagadi District", "Kgatleng District", "Ngami District", "North-East District", "North-West District", "South-East District", "Southern District"],
             Brazil: ["Acre", "Alagoas", "Amapá", "Bahia", "Ceará", "Distrito Federal", "Espírito Santo", "Goiás", "Maranhão", "Mato Grosso", "Mato Grosso do Sul", "Minas Gerais", "Pará", "Paraíba", "Paraná", "Pernambuco", "Piauí", "Rio de Janeiro", "Rio Grande do Norte", "Rio Grande do Sul", "Rondônia", "Roraima", "Santa Catarina", "São Paulo", "Sergipe", "Tocantins"],
             Brunei: ["Brunei-Muara", "Belait", "Tutong", "Temburong"],
             Bulgaria: ["Blagoevgrad", "Burgas", "Dobrich", "Gabrovo", "Kardzhali", "Kyustendil", "Montana", "Pazardzhik", "Pernik", "Plovdiv", "Razgrad", "Ruse", "Shumen", "Sofia City", "Sofia Province", "Sliven", "Smolyan", "Stara Zagora", "Targovishte", "Haskovo", "Varna", "Veliko Tarnovo", "Vidin", "Vratza"],
             Burkina_Faso: ["Boucle du Mouhoun", "Cascade", "Centre", "Centre-East", "Centre-North", "Centre-West", "Cooperation", "Est", "Haut-Bassins", "Hauts-Bassins", "Nord", "Sahel", "Sud-Ouest", "Centre-South"],
             Burundi: ["Bujumbura Mairie", "Bujumbura Rural", "Gitega", "Karuzi", "Kayanza", "Kirundo", "Makamba", "Muramvya", "Mwaro", "Ngozi", "Rumonge", "Rutana", "Cibitoke"],
             
    
             CaboVerde: ["Barlavento", "Sotavento"],
             Cambodia: ["Banteay Meanchey", "Battambang", "Kampong Cham", "Kampong Chhnang", "Kampong Speu", "Kampot", "Kandal", "Koh Kong", "Kratie", "Mondulkiri", "Phnom Penh", "Preah Vihear", "Prey Veng", "Pursat", "Siem Reap", "Sihanoukville", "Stung Treng", "Svay Rieng", "Takeo", "Oddar Meanchey"],
             Cameroon: ["Adamaoua", "Centre", "East", "Far North", "Littoral", "North", "Northwest", "South", "Southwest", "West"],
             Canada: ["Alberta", "British Columbia", "Manitoba", "New Brunswick", "Newfoundland and Labrador", "Nova Scotia", "Ontario", "Prince Edward Island", "Quebec", "Saskatchewan", "Northwest Territories", "Nunavut", "Yukon"],
             CentralAfricanRepublic: ["Bamingui-Bangoran", "Bangui", "Basse-Kotto", "Haute-Kotto", "Haut-Mbomou", "Lobaye", "Mbomou", "Ombella-M'Poko", "Sangha-Mbaéré", "Vakaga"],
             Chad: ["Batha", "Borkou", "Chari-Baguirmi", "Guéra", "Hadjer-Lamis", "Kanem", "Lac", "Logone Occidental", "Logone Oriental", "Mandoul", "Middle Chari", "Moïssala", "Niblet", "Sila", "Tandjilé", "Tchad", "Wadi Fira", "Zinder"],
             Chile: ["Arica y Parinacota", "Antofagasta", "Atacama", "Coquimbo", "Valparaíso", "Metropolitan", "O'Higgins", "Maule", "Ñuble", "Biobío", "La Araucanía", "Los Ríos", "Los Lagos", "Aysén", "Magallanes"],
             China: ["Anhui", "Beijing", "Chongqing", "Fujian", "Gansu", "Guangdong", "Guangxi", "Guizhou", "Hainan", "Hebei", "Heilongjiang", "Henan", "Hubei", "Hunan", "Inner Mongolia", "Jiangsu", "Jiangxi", "Jilin", "Liaoning", "Ningxia", "Qinghai", "Shaanxi", "Shandong", "Shanghai", "Shanxi", "Sichuan", "Tianjin", "Tibet", "Xinjiang", "Yunnan", "Zhejiang"],
             Colombia: ["Amazonas", "Antioquia", "Arauca", "Atlántico", "Bolívar", "Boyacá", "Caldas", "Caquetá", "Casanare", "Cauca", "Cesar", "Chocó", "Córdoba", "Guainía", "Guaviare", "Huila", "La Guajira", "Magdalena", "Meta", "Nariño", "Norte de Santander", "Putumayo", "Quindío", "Risaralda", "San Andrés y Providencia", "Santander", "Sucre", "Tolima", "Valle del Cauca", "Vaupés", "Vichada"],
             Comoros: ["Anjouan", "Grande Comore", "Mohéli"],
             Congo: ["Bouenza", "Brazzaville", "Cuvette", "Cuvette-Ouest", "Kouilou", "Lékoumou", "Likouala", "Niari", "Plateaux", "Pool", "Sangha"],
             CostaRica: ["Alajuela", "Cartago", "Guanacaste", "Heredia", "Limón", "Puntarenas", "San José"],
             Croatia: ["Brod-Posavina", "Dubrovačko-Neretvanska", "Istra", "Karlovac", "Koprivnica-Križevci", "Krapina-Zagorje", "Lika-Senj", "Međimurje", "Osijek-Baranja", "Požega-Slavonia", "Primorje-Gorski Kotar", "Šibenik-Knin", "Sisak-Moslavina", "Split-Dalmatia", "Varaždin", "Virovitica-Podravina", "Zadar", "Zagreb", "Zagreb City"],
             Denmark: ["Capital Region of Denmark", "Central Denmark Region", "North Denmark Region", "Region of Southern Denmark", "Zealand"],
             Djibouti: ["Ali Sabieh", "Arta", "Dikhil", "Djibouti", "Obock", "Tadjourah"],
             Dominica: ["Saint George", "Saint John", "Saint Joseph", "Saint Luke", "Saint Mark", "Saint Patrick", "Saint Paul", "Saint Peter"],
             DominicanRepublic: ["Azua", "Baoruco", "Barahona", "Dajabón", "Duarte", "El Seibo", "Hato Mayor", "Independencia", "La Altagracia", "La Romana", "La Vega", "María Trinidad Sánchez", "Monte Cristi", "Monte Plata", "Pedernales", "Peravia", "Puerto Plata", "Samaná", "San Cristóbal", "San José de Ocoa", "San Juan", "San Pedro de Macorís", "Sánchez Ramírez", "Santo Domingo", "Valverde"],
             Ecuador: ["Azuay", "Bolívar", "Cañar", "Carchi", "Chimborazo", "Esmeraldas", "Galápagos", "Guayas", "Los Ríos", "Manabí", "Morona Santiago", "Napo", "Orellana", "Pastaza", "Pichincha", "Tungurahua", "Zamora-Chinchipe"],
             Egypt: ["Alexandria", "Aswan", "Asyut", "Beheira", "Beni Suef", "Cairo", "Dakahlia", "Damietta", "Faiyum", "Gharbia", "Giza", "Ismailia", "Kafr El Sheikh", "Luxor", "Matruh", "Minya", "Qalyubia", "Qena", "Red Sea", "Sharqia", "Sohag", "South Sinai", "Suez"],
             ElSalvador: ["Ahuachapan", "Cabañas", "Chalatenango", "Cuscatlán", "La Libertad", "La Paz", "La Unión", "Morazán", "San Miguel", "San Salvador", "Santa Ana", "San Vicente"],
             EquatorialGuinea: ["Annobón", "Bioko Norte", "Bioko Sur", "Centro Sur", "Djibloho", "La Litoral", "Wele-Nzas"],
             Eritrea: ["Anseba", "Debub", "Gash-Barka", "Maekel", "Semen", "Southern Red Sea"],
             Estonia: ["Harju County", "Hiiu County", "Ida-Viru County", "Lääne County", "Lääne-Viru County", "Pärnu County", "Rapla County", "Saare County", "Tartu County", "Valga County", "Viljandi County", "Võru County"],
    
             
             Fiji: [
                "Ba", "Bua", "Cakaudrove", 
                "Kadavu", "Lautoka", "Lomaiviti", 
                "Macuata", "Nadroga-Navosa", "Naitasiri", 
                "Ra", "Rewa", "Serua", 
                "Tailevu", "Western Division"
            ],
            Finland: [
                "Aland Islands", "Uusimaa", "Southwest Finland", 
                "Satakunta", "Pirkanmaa", "Päijänne Tavastia", 
                "Kymenlaakso", "South Karelia", "North Karelia", 
                "Central Finland", "North Savo", "South Savo", 
                "North Ostrobothnia", "Oulu", "Lapland", 
                "Kainuu", "Åland"
            ],
            France: [
                "Auvergne-Rhône-Alpes", "Bourgogne-Franche-Comté", "Brittany", 
                "Centre-Val de Loire", "Grand Est", "Hauts-de-France", 
                "Île-de-France", "Normandy", "Nouvelle-Aquitaine", 
                "Occitanie", "Pays de la Loire", "Provence-Alpes-Côte d'Azur", 
                "Corsica"
            ],
            Gabon: [
                "Estuaire", "Ogooué-Lolo", "Ogooué-Maritime", 
                "Woleu-Ntem", "Ngounié", "Moukalaba-Doudou", 
                "Nyanga", "Haut-Ogooué"
            ],
            Gambia: [
                "Banjul", "Western Division", "Lower River Division", 
                "Central River Division", "Upper River Division", 
                "North Bank Division", "Janjanbureh", "Basse"
            ],
            Georgia: [
                "Abkhazia", "Ajaria", "Guria", 
                "Imereti", "Kakheti", "Kvemo Kartli", 
                "Mtskheta-Mtianeti", "Racha-Lechkhumi and Kvemo Svaneti", "Samegrelo-Zemo Svaneti", 
                "Samtskhe-Javakheti", "Tbilisi"
            ],
            Germany: [
                "Baden-Württemberg", "Bavaria", "Berlin", 
                "Brandenburg", "Bremen", "Hamburg", 
                "Hesse", "Lower Saxony", "Mecklenburg-Vorpommern", 
                "North Rhine-Westphalia", "Rhineland-Palatinate", "Saarland", 
                "Saxony", "Saxony-Anhalt", "Schleswig-Holstein", 
                "Thuringia"
            ],
            Ghana: [
                "Greater Accra", "Western", "Western North", 
                "Central", "Eastern", "Northern", 
                "Ashanti", "Western Region", "Volta", 
                "Oti", "Upper East", "Upper West"
            ],
            Greece: [
                "Attica", "Central Greece", "Central Macedonia", 
                "Crete", "Epirus", "Thessaly", 
                "Western Greece", "Western Macedonia", "North Aegean", 
                "South Aegean", "Dodecanese", "Ionian Islands", 
                "Peloponnese"
            ],
            Grenada: [
                "Saint George", "Saint David", "Saint Patrick", 
                "Saint Andrew", "Saint John", "Carriacou and Petite Martinique"
            ],
            Guatemala: [
                "Alta Verapaz", "Baja Verapaz", "Chimaltenango", 
                "Chiquimula", "El Progreso", "Escuintla", 
                "Guatemala", "Huehuetenango", "Izabal", 
                "Jalapa", "San Marcos", "Santa Rosa", 
                "Solalá", "Totonicapán", "Zacapa"
            ],
            Guinea: [
                "Beyla", "Boke", "Conakry", 
                "Coyah", "Dabola", "Dinguiraye", 
                "Faranah", "Forecariah", "Fria", 
                "Guéckédou", "Kankan", "Kissidougou", 
                "Labe", "Macenta", "Mali", 
                "Mamou", "Nzérékoré", "Pita", 
                "Tougué", "Yomou"
            ],
            "Guinea-Bissau": [
                "Bissau", "Bafatá", "Bolama", 
                "Cacheu", "Gabu", "Oio", 
                "Quinara", "Tombali"
            ],


            Haiti: [
                "Artibonite", "Center", "Grand'Anse", 
                "Nippes", "Nord", "Nord-Est", 
                "Ouest", "Sud", "Sud-Est"
            ],
            Honduras: [
                "Atlántida", "Choluteca", "Colón", 
                "Copán", "Cortés", "El Paraíso", 
                "Francisco Morazán", "Gracia", "Islas de la Bahía", 
                "La Paz", "Lempira", "Ocotepeque", 
                "Santa Bárbara", "Valle", "Yoro"
            ],
            Hungary: [
                "Bács-Kiskun", "Békés", "Borsod-Abaúj-Zemplén", 
                "Budapest", "Csongrád-Csanád", "Fejér", 
                "Győr-Moson-Sopron", "Hajdú-Bihar", "Heves", 
                "Jász-Nagykun-Szolnok", "Komárom-Esztergom", "Nógrád", 
                "Pest", "Somogy", "Szabolcs-Szatmár-Bereg", 
                "Tolna", "Vas", "Veszprém", "Zala"
            ],
            Iceland: [
                "Austurland", "Hauteland", "Reykjavík", 
                "Suðurland", "Vestfirðir", "Vesturland"
            ],
            India: [
                "Andhra Pradesh", "Arunachal Pradesh", "Assam", 
                "Bihar", "Chhattisgarh", "Goa", 
                "Gujarat", "Haryana", "Himachal Pradesh", 
                "Jharkhand", "Karnataka", "Kerala", 
                "Madhya Pradesh", "Maharashtra", "Manipur", 
                "Meghalaya", "Mizoram", "Nagaland", 
                "Odisha", "Punjab", "Rajasthan", 
                "Sikkim", "Tamil Nadu", "Telangana", 
                "Tripura", "Uttar Pradesh", "Uttarakhand", 
                "West Bengal"
            ],
            Indonesia: [
                "Aceh", "Bali", "Banten", 
                "Bengkulu", "Central Java", "East Java", 
                "Gorontalo", "Jakarta", "West Java", 
                "West Nusa Tenggara", "East Nusa Tenggara", "Riau", 
                "South Sumatra", "North Sumatra", "South Sulawesi", 
                "North Sulawesi", "West Sulawesi", "Lampung", 
                "Maluku", "North Maluku", "Papua", 
                "West Papua", "Jambi", "Kepulauan Bangka Belitung", 
                "Kepulauan Riau", "Central Kalimantan", "East Kalimantan", 
                "North Kalimantan", "South Kalimantan", "West Kalimantan"
            ],
            Jamaica: [
                "Clarendon", "Hanover", "Kingston", 
                "Manchester", "Portland", "Saint Andrew", 
                "Saint Ann", "Saint Catherine", "Saint Elizabeth", 
                "Saint James", "Saint Mary", "Saint Thomas", 
                "Trelawny", "Westmoreland"
            ],
            Japan: [
                "Aichi", "Akita", "Aomori", 
                "Chiba", "Ehime", "Fukui", 
                "Fukuoka", "Fukushima", "Gifu", 
                "Gunma", "Hiroshima", "Hokkaido", 
                "Hyōgo", "Ibaraki", "Ishikawa", 
                "Iwate", "Kagawa", "Kagoshima", 
                "Kanagawa", "Kochi", "Kumamoto", 
                "Kyoto", "Mie", "Miyagi", 
                "Miyazaki", "Nagano", "Nagasaki", 
                "Niigata", "Oita", "Okayama", 
                "Okinawa", "Osaka", "Saga", 
                "Saitama", "Shiga", "Shimane", 
                "Shizuoka", "Tochigi", "Tokushima", 
                "Tokyo", "Tottori", "Toyama", 
                "Wakayama", "Yamagata", "Yamaguchi", 
                "Yamanashi"
            ],
            Kazakhstan: [
                "Akmola", "Aktobe", "Almaty", 
                "East Kazakhstan", "Karaganda", "Kazakhstan", 
                "Kyzylorda", "Mangystau", "Pavlodar", 
                "North Kazakhstan", "Turkistan", "Almaty City", 
                "Shymkent"
            ],
            Kenya: [
                "Bomet", "Bungoma", "Busia", 
                "Elgeyo-Marakwet", "Embu", "Garissa", 
                "Homa Bay", "Isiolo", "Kajiado", 
                "Kakamega", "Kericho", "Kilifi", 
                "Kirinyaga", "Kisii", "Kisumu", 
                "Laikipia", "Lamu", "Machakos", 
                "Makueni", "Mandera", "Marsabit", 
                "Meru", "Migori", "Nairobi City", 
                "Nakuru", "Narok", "Nyandarua", 
                "Nyeri", "Samburu", "Siaya", 
                "Taita-Taveta", "Tana River", "Tharaka-Nithi", 
                "Trans-Nzoia", "Uasin Gishu", "Vihiga", 
                "Wajir", "West Pokot"
            ],
            Kiribati: [
                "Gilbert Islands", "Line Islands", 
                "Phoenix Islands"
            ],
            Kuwait: [
                "Al Ahmadi", "Al Farwaniyah", "Al Jahra", 
                "Hawalli", "Mubarak Al-Kabeer", "Capital Governorate", 
                "Al Asimah"
            ],

            "Laos": [
                "Attapeu", "Bokeo", "Bolikhamsai", 
                "Champasak", "Houaphanh", "Khammouane", 
                "Luang Prabang", "Oudomxay", "Phongsali", 
                "Salavan", "Savannakhet", "Vientiane", 
                "Vientiane Prefecture", "Xaignabouli", "Xekong", 
                "Xieng Khouang"
            ],
            Latvia: [
                "Aizkraukle", "Alūksne", "Bauska", 
                "Cēsis", "Daugavpils", "Dobele", 
                "Jūrmala", "Jelgava", "Liepāja", 
                "Rēzekne", "Riga", "Ventspils", 
                "Rīgas", "Pierīga", "Kurzeme", 
                "Zemgale", "Vidzeme", "Latgale"
            ],
            Lebanon: [
                "Akkar", "Baalbek-Hermel", "Beirut", 
                "Beqaa", "Mount Lebanon", "Nabatieh", 
                "North Governorate", "South Governorate", 
                "South Lebanon"
            ],
            Lesotho: [
                "Berea", "Butha-Buthe", "Leribe", 
                "Mafeteng", "Maseru", "Mohale's Hoek", 
                "Mokhotlong", "Qacha's Nek", "Quthing", 
                "Thaba-Tseka"
            ],
            Liberia: [
                "Bong", "Bomi", "Gbarpolu", 
                "Grand Bassa", "Grand Cape Mount", "Grand Gedeh", 
                "Grand Kru", "Lofa", "Margibi", 
                "Maryland", "Montserrado", "Nimba", 
                "River Cess", "River Gee", "Sinoe"
            ],
            Libya: [
                "Ajdabiya", "Al Bayda", "Al Kufrah", 
                "Al Marj", "Al Wahat", "Azzawiya", 
                "Benghazi", "Derna", "Ghat", 
                "Ghadames", "Jufra", "Misrata", 
                "Murzuq", "Sabha", "Sirt", 
                "Tripoli", "Tubruq", "Zliten"
            ],
            Madagascar: [
                "Antananarivo", "Antananarivo-Avaradrano", "Antananarivo-Atsimondrano", 
                "Atsimo-Andrefana", "Atsinanana", "Bongolava", 
                "Diana", "Fianarantsoa", "Ihorombe", 
                "Itasy", "Menabe", "Sofia", 
                "Vakinankaratra", "Vatovavy-Fitovinany"
            ],
            Malawi: [
                "Blantyre", "Chikwawa", "Chiradzulu", 
                "Dedza", "Dowa", "Karonga", 
                "Kasungu", "Lilongwe", "Machinga", 
                "Mangochi", "Mulanje", "Nkhata Bay", 
                "Nkhotakota", "Nsanje", "Ntcheu", 
                "Ntchisi", "Salima", "Zomba"
            ],
            Malaysia: [
                "Johor", "Kedah", "Kelantan", 
                "Malacca", "Negeri Sembilan", "Pahang", 
                "Penang", "Perak", "Perlis", 
                "Selangor", "Terengganu", "Kuala Lumpur", 
                "Putrajaya", "Labuan"
            ],
            Maldives: [
                "Alif Dhaal Atoll", "Alif Uthuru Atoll", "Baa Atoll", 
                "Dhaalu Atoll", "Faafu Atoll", "Gaaf Dhaal Atoll", 
                "Gaaf Alif Atoll", "Gnaviyani Atoll", "Haa Dhaal Atoll", 
                "Haa Alif Atoll", "Kaafu Atoll", "Laamu Atoll", 
                "Lhaviyani Atoll", "Meemu Atoll", "Noonu Atoll", 
                "Raa Atoll", "Thaa Atoll", "Vaavu Atoll"
            ],
            Mali: [
                "Bamako", "Gao", "Kayes", 
                "Kidal", "Koulikoro", "Mopti", 
                "Sikasso", "Segou", "Tombouctou"
            ],
            Malta: [
                "Gozo", "Malta"
            ],
            Mexico: [
                "Aguascalientes", "Baja California", "Baja California Sur", 
                "Campeche", "Chiapas", "Chihuahua", 
                "Coahuila", "Colima", "Durango", 
                "Guanajuato", "Guerrero", "Hidalgo", 
                "Jalisco", "Mexico State", "Michoacán", 
                "Morelos", "Nayarit", "Nuevo León", 
                "Oaxaca", "Puebla", "Querétaro", 
                "Quintana Roo", "San Luis Potosí", "Sinaloa", 
                "Sonora", "Tabasco", "Tamaulipas", 
                "Tlaxcala", "Veracruz", "Yucatán", 
                "Zacatecas"
            ],
            Moldova: [
                "Bălți", "Bender", "Chișinău", 
                "Cahul", "Căușeni", "Criuleni", 
                "Drochia", "Edineț", "Fălești", 
                "Florești", "Hîncești", "Ialoveni", 
                "Nisporeni", "Ocnița", "Orhei", 
                "Rîșcani", "Sîngerei", "Soroca", 
                "Strășeni", "Taraclia", "Telenești", 
                "Ungheni"
            ],
            Monaco: [
                "Monaco"
            ],
            Mongolia: [
                "Arhangai", "Bayan-Olgii", "Bayankhongor", 
                "Bulgan", "Darkhan-Uul", "Dornod", 
                "Dornogovi", "Duvankhad", "Gobi-Altai", 
                "Khentii", "Khovd", "Khuvsgul", 
                "Orkhon", "Selenge", "Somon", 
                "Tuv", "Uvs"
            ],
            Montenegro: [
                "Andrijevica", "Bar", "Berane", 
                "Bijelo Polje", "Budva", "Herceg Novi", 
                "Kolašin", "Nikšić", "Plav", 
                "Pljevlja", "Podgorica", "Rožaje", 
                "Tivat", "Užice", "Zabljak"
            ],

            Namibia: [
    "Caprivi", "Erongo", "Hardap", 
    "Karas", "Kavango East", "Kavango West", 
    "Khomas", "Otjozondjupa", "Omaheke", 
    "Omusati", "Oshana", "Oshikoto", 
    "Zambezi"
],
Nauru: [
    "Ainmari", "Boe", "Buada", 
    "Denigomodu", "Nauru", "Yaren"
],
Nepal: [
    "Bagmati", "Gandaki", "Karnali", 
    "Lumbini", "Mahakali", "Mechi", 
    "Madhesh", "Seti", "Sudurpashchim"
],
Netherlands: [
    "Drenthe", "Flevoland", "Friesland", 
    "Gelderland", "Groningen", "Limburg", 
    "North Brabant", "North Holland", "Overijssel", 
    "South Holland", "Utrecht", "Zeeland"
],
NewZealand: [
    "Auckland", "Bay of Plenty", "Canterbury", 
    "Gisborne", "Hawke's Bay", "Manawatu-Wanganui", 
    "Marlborough", "Nelson", "Northland", 
    "Otago", "Southland", "Taranaki", 
    "Wairarapa", "Waikato", "Wellington"
],
Nicaragua: [
    "Chinandega", "Chontales", "Estelí", 
    "Granada", "Jinotega", "León", 
    "Masaya", "Matagalpa", "Rivas", 
    "Managua"
],
Niger: [
    "Agadez", "Diffa", "Dosso", 
    "Maradi", "Niamey", "Tahoua", 
    "Tillabéri", "Zinder"
],
Nigeria: [
    "Abia", "Adamawa", "Akwa Ibom", 
    "Anambra", "Bauchi", "Bayelsa", 
    "Benue", "Borno", "Cross River", 
    "Delta", "Ebonyi", "Edo", 
    "Ekiti", "Enugu", "Gombe", 
    "Imo", "Jigawa", "Kaduna", 
    "Kano", "Kogi", "Kwara", 
    "Lagos", "Nasarawa", "Niger", 
    "Ogun", "Ondo", "Osun", 
    "Oyo", "Plateau", "Rivers", 
    "Sokoto", "Taraba", "Yobe", 
    "Zamfara"
],
NorthMacedonia: [
    "Aegean Macedonia", "Vardar", "Eastern Macedonia and Thrace", 
    "Skopje", "Pelagonia", "Polog", 
    "Bitola", "Southeast", "Northwest"
],
Norway: [
    "Akershus", "Aust-Agder", "Buskerud", 
    "Finnmark", "Hedmark", "Hedmark", 
    "More og Romsdal", "Nordland", "Oppland", 
    "Oslo", "Rogaland", "Sogn og Fjordane", 
    "Telemark", "Troms", "Vest-Agder", 
    "Vestfold"
],
Oman: [
    "Ad Dakhiliyah", "Al Batinah", "Al Dhahirah", 
    "Al Sharqiyah", "Al Wusta", "Dhofar", 
    "Muscat", "Musandam", "North Al Batinah", 
    "North Al Sharqiyah", "South Al Batinah", "South Al Sharqiyah"
],
Pakistan: [
    "Azad Kashmir", "Balochistan", "Gilgit-Baltistan", 
    "Khyber Pakhtunkhwa", "Punjab", "Sindh"
],
Palau: [
    "Babeldaob", "Koror", "Peleliu", 
    "Angaur", "Sonsorol", "Hatohobei"
],
Panama: [
    "Bocas del Toro", "Chiriquí", "Coclé", 
    "Colón", "Darien", "Herrera", 
    "Los Santos", "Panamá", "Veraguas"
],
Guinea: [
    "Central", "Gulf", "Milne Bay", 
    "Morobe", "New Ireland", "East New Britain", 
    "West New Britain", "Western", "Southern Highlands", 
    "Enga", "Hela", "Western Highlands", 
    "East Sepik", "West Sepik", "Madang", 
    "Oro"
],
Peru: [
    "Amazonas", "Áncash", "Apurímac", 
    "Arequipa", "Ayacucho", "Cajamarca", 
    "Callao", "Cusco", "Huancavelica", 
    "Huánuco", "Ica", "Junín", 
    "La Libertad", "Lambayeque", "Lima", 
    "Loreto", "Madre de Dios", "Moquegua", 
    "Pasco", "Piura", "Puno", 
    "San Martín", "Tacna", "Tumbes", 
    "Ucayali"
],
Philippines: [
    "Abra", "Agusan del Norte", "Agusan del Sur", 
    "Aklan", "Albay", "Antique", 
    "Apayao", "Aurora", "Basilan", 
    "Bataan", "Batanes", "Batangas", 
    "Benguet", "Bohol", "Bukidnon", 
    "Bulacan", "Cagayan", "Camarines Norte", 
    "Camarines Sur", "Camiguin", "Capiz", 
    "Catanduanes", "Cavite", "Cebu", 
    "Compostela Valley", "Davao del Norte", "Davao del Sur", 
    "Davao Occidental", "Eastern Samar", "Guimaras", 
    "Ifugao", "Ilocos Norte", "Ilocos Sur", 
    "Iloilo", "Isabela", "Kalinga", 
    "La Union", "Laguna", "Lanao del Norte", 
    "Lanao del Sur", "Leyte", "Maguindanao", 
    "Marinduque", "Masbate", "Misamis Occidental", 
    "Misamis Oriental", "Mountain Province", "Negros Occidental", 
    "Negros Oriental", "Northern Samar", "Nueva Ecija", 
    "Nueva Vizcaya", "Occidental Mindoro", "Oriental Mindoro", 
    "Palawan", "Pampanga", "Pangasinan", 
    "Quezon", "Quirino", "Rizal", 
    "Romblon", "Samar", "Sarangani", 
    "Siquijor", "Sorsogon", "South Cotabato", 
    "Southern Leyte", "Sultan Kudarat", "Tarlac", 
    "Tawi-Tawi", "Zambales", "Zamboanga del Norte", 
    "Zamboanga del Sur", "Zamboanga Sibugay"
],
Portugal: [
    "Aveiro", "Beja", "Braga", 
    "Bragança", "Castelo Branco", "Coimbra", 
    "Évora", "Faro", "Guarda", 
    "Leiria", "Lisbon", "Portalegre", 
    "Porto", "Santarém", "Setúbal", 
    "Viana do Castelo", "Vila Real", "Viseu"
],

Qatar: [
        "Ad Dawhah", "Al Gharbiyah", "Al Khawr", 
        "Al Rayyan", "Al Wakrah", "Ash Shamal", 
        "Az Za'ayin", "Doha", "Umm Salal"
    ],
    Romania: [
        "Alba", "Arad", "Arges", "Bacau", "Bihor", 
        "Bistrita-Nasaud", "Botosani", "Braila", "Brasov", 
        "Bucuresti", "Buzau", "Calarasi", "Caras-Severin", 
        "Cluj", "Constanta", "Dambovita", "Dolj", 
        "Galati", "Giurgiu", "Gorj", "Harghita", 
        "Hunedoara", "Ialomita", "Iasi", "Ilfov", 
        "Maramures", "Mehedinti", "Mures", "Neamt", 
        "Olt", "Prahova", "Satu Mare", "Salaj", 
        "Sibiu", "Suceava", "Teleorman", "Timis", 
        "Tulcea", "Vaslui", "Valcea", "Vrancea"
    ],
    Russia: [
        "Adygea", "Altai", "Bashkortostan", "Buryatia", 
        "Chechen", "Chelyabinsk", "Chuvashia", "Dagestan", 
        "Ingushetia", "Kabardino-Balkaria", "Kalmykia", 
        "Karelia", "Khakassia", "Komi", "Mari El", 
        "Mordovia", "North Ossetia", "Sakha", "Tatarstan", 
        "Tuva", "Udmurtia", "Volgograd", "Yamalo-Nenets"
    ],
    KSA: [
        "Al Bahah", "Al Jawf", "Al Madinah", "Al Qassim", 
        "Al Riyadh", "Asir", "Eastern Province", "Jizan", 
        "Makkah", "Najran", "Northern Borders", "Tabuk"
    ],
    Senegal: [
        "Dakar", "Diourbel", "Fatick", "Kaolack", 
        "Kedougou", "Kolda", "Louga", "Matam", 
        "Saint-Louis", "Sedhiou", "Tambacounda", "Thies", 
        "Ziguinchor"
    ],
    SierraLeone: [
        "Bombali", "Bonthe", "Kailahun", "Kambia", 
        "Kenema", "Kono", "Port Loko", "Pujehun", 
        "Western Area"
    ],
    Singapore: [
        "Central Region", "East Region", "North Region", 
        "North-East Region", "West Region"
    ],
    Slovakia: [
        "Bratislava", "Trnava", "Nitra", "Zilina", 
        "Banska Bystrica", "Prešov", "Košice"
    ],
    Slovenia: [
        "Pomurska", "Podravska", "Zasavska", "Posavska", 
        "Savinja", "Central Sava", "Gorenjska", "Goriška", 
        "Jugovzhodna Slovenia"
    ],
    SouthAfrica: [
        "Eastern Cape", "Free State", "Gauteng", "Kwazulu-Natal", 
        "Limpopo", "Mpumalanga", "Northern Cape", "North West", 
        "Western Cape"
    ],
    SouthKorea: [
        "Seoul", "Busan", "Incheon", "Gwangju", 
        "Daejeon", "Ulsan", "Sejong", "Gyeonggi-do", 
        "Gangwon-do", "Chungcheongbuk-do", "Chungcheongnam-do", 
        "Jeollabuk-do", "Jeollanam-do", "Gyeongsangbuk-do", 
        "Gyeongsangnam-do", "Jeju-do"
    ],
    Spain: [
        "Andalusia", "Aragon", "Asturias", "Balearic Islands", 
        "Basque Country", "Canary Islands", "Cantabria", 
        "Castile and León", "Castilla-La Mancha", "Catalonia", 
        "Extremadura", "Galicia", "La Rioja", "Madrid", 
        "Murcia", "Navarre", "Valencian Community"
    ],
    Sweden: [
        "Stockholm", "Uppsala", "Södermanland", "Östergötland", 
        "Jönköping", "Kronoberg", "Kalmar", "Gotland", 
        "Blekinge", "Skåne", "Halland", "Västra Götaland", 
        "Värmland", "Örebro", "Dalarna", "Gävleborg", 
        "Hälsingland", "Jämtland", "Västernorrland", 
        "Västerbotten", "Norrbotten"
    ],
    Switzerland: [
        "Aargau", "Appenzell Innerrhoden", "Appenzell Ausserrhoden", 
        "Basel-Country", "Basel-City", "Bern", "Fribourg", 
        "Geneva", "Glarus", "Graubünden", "Lucerne", 
        "Neuchâtel", "Nidwalden", "Obwalden", "Schaffhausen", 
        "Solothurn", "Thurgau", "Uri", "Valais", 
        "Vaud", "Zug", "Zurich"
    ],

    Tajikistan: [
    "Dushanbe", "Gorno-Badakhshan", "Khatlon", 
    "Sughd", "Districts of Republican Subordination"
],
Tanzania: [
    "Arusha", "Dar es Salaam", "Dodoma", 
    "Geita", "Kagera", "Katavi", "Kigoma", 
    "Kilimanjar", "Lindi", "Manyara", "Mara", 
    "Mbeya", "Morogoro", "Mtwara", "Njombe", 
    "Pemba North", "Pemba South", "Rukwa", 
    "Ruvuma", "Shinyanga", "Simiyu", 
    "Singida", "Tabora", "Tanga"
],
Thailand: [
    "Bangkok", "Chiang Mai", "Chonburi", 
    "Krabi", "Lampang", "Nakhon Pathom", 
    "Nakhon Ratchasima", "Nakhon Si Thammarat", 
    "Nonthaburi", "Pathum Thani", "Phetchaburi", 
    "Phuket", "Rayong", "Samut Prakan", 
    "Samut Sakhon", "Saraburi", "Surat Thani", 
    "Ubon Ratchathani", "Uttaradit"
],
Togo: [
    "Maritime", "Plateau", "Central", 
    "Kara", "Savanes"
],
Tonga: [
    "Haʻapai", "Vavaʻu", "Tongatapu", "ʻEua", 
    "Niuas"
],
TrinidadandTobago: [
    "Trinidad", "Tobago"
],
Tunisia: [
    "Ariana", "Beja", "Ben Arous", "Bizerte", 
    "Gabès", "Gafsa", "Jendouba", "Kairouan", 
    "Kasserine", "Kébili", "Manouba", "Medenine", 
    "Monastir", "Nabeul", "Sfax", "Sousse", 
    "Tunis", "Zaghouan"
],
Turkey: [
    "Adana", "Adiyaman", "Afyonkarahisar", 
    "Ağrı", "Amasya", "Ankara", "Antalya", 
    "Artvin", "Aydın", "Balıkesir", "Bilecik", 
    "Bingöl", "Bitlis", "Bolu", "Burdur", 
    "Bursa", "Çanakkale", "Çankırı", "Denizli", 
    "Diyarbakır", "Edirne", "Elazığ", "Erzincan", 
    "Erzurum", "Eskişehir", "Gaziantep", "Giresun", 
    "Gümüşhane", "Hakkari", "Hatay", "Iğdır", 
    "Isparta", "Istanbul", "Izmir", "Kahramanmaraş", 
    "Karabük", "Kars", "Kastamonu", "Kayseri", 
    "Kırıkkale", "Kırklareli", "Kocaeli", "Konya", 
    "Kütahya", "Malatya", "Manisa", "Mardin", 
    "Mugla", "Nevşehir", "Niğde", "Ordu", 
    "Osmaniye", "Rize", "Sakarya", "Samsun", 
    "Siirt", "Sinop", "Sivas", "Tekirdağ", 
    "Tokat", "Trabzon", "Tunceli", "Şanlıurfa", 
    "Uşak", "Van", "Yalova", "Yozgat", 
    "Zonguldak"
],

Uganda: [
    "Central Region", "Eastern Region", "Northern Region", "Western Region"
],
Ukraine: [
    "Cherkasy Oblast", "Chernihiv Oblast", "Chernivtsi Oblast", 
    "Dnipropetrovsk Oblast", "Donetsk Oblast", "Ivano-Frankivsk Oblast", 
    "Kharkiv Oblast", "Kherson Oblast", "Khmelnytskyi Oblast", 
    "Kirovohrad Oblast", "Lviv Oblast", "Mykolaiv Oblast", 
    "Odessa Oblast", "Poltava Oblast", "Rivne Oblast", 
    "Sumy Oblast", "Ternopil Oblast", "Vinnytsia Oblast", 
    "Volyn Oblast", "Zaporozhye Oblast", "Zhytomyr Oblast", 
    "Autonomous Republic of Crimea"
],
UAE: [
    "Abu Dhabi", "Ajman", "Dubai", "Fujairah", 
    "Ras Al Khaimah", "Sharjah", "Umm Al-Quwain"
],
UK: [
    "England", "Northern Ireland", "Scotland", "Wales"
],
US: [
    "Alabama", "Alaska", "Arizona", "Arkansas", "California", 
    "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", 
    "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", 
    "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", 
    "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", 
    "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", 
    "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", 
    "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", 
    "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", 
    "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"
],
Uruguay: [
    "Artigas", "Canelones", "Cerro Largo", "Colonia", 
    "Durazno", "Flores", "Florida", "Lavalleja", 
    "Maldonado", "Montevideo", "Paysandú", "Rio Negro", 
    "Rivera", "Rocha", "Salto", "San José", 
    "Soriano", "Tacuarembó", "Treinta y Tres"
],
Vanuatu: [
    "Malampa", "Penama", "Sanma", "Shefa", "Tafea", "Torba"
],
VaticanCity: [], // Vatican City is a city-state with no subdivisions
Venezuela: [
    "Amazonas", "Anzoátegui", "Apure", "Aragua", "Barinas", 
    "Bolívar", "Carabobo", "Cojedes", "Delta Amacuro", "Falcon", 
    "Guárico", "Lara", "Merida", "Miranda", "Monagas", 
    "Nueva Esparta", "Portuguesa", "Sucre", "Táchira", 
    "Trujillo", "Vargas", "Yaracuy", "Zulia"
],
Vietnam: [
    "An Giang", "Bac Giang", "Bac Kan", "Bac Ninh", 
    "Binh Dinh", "Binh Duong", "Binh Phuoc", "Ca Mau", 
    "Cao Bang", "Dak Lak", "Dak Nong", "Da Nang", 
    "Dong Nai", "Dong Thap", "Hau Giang", "Hanoi", 
    "Ha Giang", "Ha Nam", "Ha Tinh", "Ho Chi Minh City", 
    "Hoa Binh", "Hung Yen", "Khanh Hoa", "Kien Giang", 
    "Lai Chau", "Lang Son", "Nam Dinh", "Ninh Binh", 
    "Ninh Thuan", "Phu Tho", "Quang Binh", "Quang Nam", 
    "Quang Ngai", "Quang Ninh", "Soc Trang", "Son La", 
    "Tay Ninh", "Thai Binh", "Thai Nguyen", "Thanh Hoa", 
    "Thua Thien-Hue", "Tien Giang", "Tra Vinh", "Vinh Long", 
    "Vinh Phuc", "Yen Bai"
],
Wales: [], // Wales is a country within the United Kingdom and doesn't have separate states
WesternSahara: [], // Western Sahara is a disputed territory, not a country with states


Yemen: [
    "Aden", "Amran", "Al-Bayda", "Al-Dhalea", "Al-Jawf", 
    "Al-Mahwit", "Dhamar", "Hajjah", "Ibb", "Lahij", 
    "Marib", "Saada", "Sana'a", "Shabwa", "Hadramaut", 
    "Socotra", "Al-Mahrah"
],
Zimbabwe: [
    "Bulawayo", "Harare", "Manicaland", "Mashonaland Central", 
    "Mashonaland East", "Mashonaland West", "Masvingo", 
    "Midlands", "Matabeleland North", "Matabeleland South"
],
Iran: [
    "Alborz", "Ardabil", "Bushehr", "Chaharmahal and Bakhtiari", 
    "East Azerbaijan", "Esfahan", "Fars", "Gilan", 
    "Golestan", "Hamadan", "Hormozgan", "Kerman", 
    "Kermanshah", "Khuzestan", "Kohgiluyeh and Boyer-Ahmad", 
    "Lorestan", "Markazi", "Mazandaran", "Qazvin", 
    "Qom", "Semnan", "Sistan and Baluchestan", "Tehran", 
    "Yazd", "Zanjan"
],
Iraq: [
    "Al Anbar", "Al Qadisiyyah", "Al Sulaymaniyah", "Arbil", 
    "Baghdad", "Dhi Qar", "Diyala", "Karbalā'", 
    "Kirkuk", "Maysan", "Najaf", "Nineveh", 
    "Saladin", "Wasit", "Basra", "Babil"
],
Ireland: [
    "Carlow", "Cavan", "Clare", "Cork", 
    "Donegal", "Dublin", "Galway", "Kerry", 
    "Kildare", "Kilkenny", "Laois", "Leitrim", 
    "Limerick", "Longford", "Louth", "Mayo", 
    "Meath", "Monaghan", "Offaly", "Roscommon", 
    "Sligo", "Tipperary", "Waterford", "Westmeath", 
    "Wexford", "Wicklow"
],





    // Add more countries and their states/provinces as needed
};

function updateStates() {
    const countrySelect = document.getElementById("country");
    const stateSelect = document.getElementById("state");
    const selectedCountry = countrySelect.value;

    // Clear existing options
    stateSelect.innerHTML = '<option value="">Select State</option>';

    if (selectedCountry in statesByCountry) {
        statesByCountry[selectedCountry].forEach(state => {
            const option = document.createElement("option");
            option.value = state;
            option.textContent = state;
            stateSelect.appendChild(option);
        });
    }
}
