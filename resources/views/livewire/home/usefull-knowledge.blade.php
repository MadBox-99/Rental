<div class="grid grid-cols-1 md:grid-cols-2 gap-8 py-8" x-data="{ open: null }">
    <div>
        <h2 class="text-2xl font-bold text-red-600 mb-4">Hasznos tudnivalók</h2>
        <div class="border border-red-500 rounded-lg">
            <button @click="open = (open === 1 ? null : 1)"
                class="w-full text-left px-4 py-2 bg-red-100 text-red-600 font-semibold flex justify-between items-center">
                <span>További részletek autóbérlés szolgáltatásunkról</span>
                <i :class="open === 1 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="open === 1" class="px-4 py-2 text-sm text-gray-700" x-cloak>
                <div id="accordion-2819802073-content" class="accordion-inner"
                    aria-labelledby="accordion-2819802073-label" style="display: block;">

                    <p>Cégünknél modern, légkondicionált személyautók, kisbuszok, autóbuszok és haszongépjárművek
                        bérelhetők <strong>korlátlan kilométerhasználattal</strong>, <strong>ingyenes
                            biztosítással</strong> és <strong>díjmentes kiszállítással</strong>.</p>
                    <p>Tartósbérlet esetén <strong>személyre szabott árajánlattal</strong> állunk rendelkezésére,
                        igazodva az Ön igényeihez.</p>
                    <p>Autóbuszaink és személyautóink akár <strong>sofőrrel együtt is igénybe vehetők</strong>, legyen
                        szó céges rendezvényről, csapatépítőről vagy privát utazásról.</p>
                    <p><strong>Belföldön és külföldön egyaránt vállalunk személyszállítást</strong>, megbízható
                        járműparkkal és tapasztalt sofőrökkel.</p>
                    <p>Különleges alkalmakra is gondoltunk: nálunk lehetősége van <strong>esküvői autók</strong>,
                        valamint <strong>smart és luxus kategóriás járművek</strong> bérlésére is.</p>
                </div>
            </div>
        </div>
        <div class="border border-red-500 rounded-lg mt-4">
            <button @click="open = (open === 2 ? null : 2)"
                class="w-full text-left px-4 py-2 bg-red-100 text-red-600 font-semibold flex justify-between items-center">
                <span>Folyamatos személyautó-bérlés esetén ügyfeleink számára a klasszikus rent-a-car szolgáltatások
                    teljes köre díjmentesen elérhető.</span>
                <i :class="open === 2 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="open === 2" class="px-4 py-2 text-sm text-gray-700" x-cloak>
                <div id="accordion-1594695345-content" class="accordion-inner"
                    aria-labelledby="accordion-1594695345-label" style="display: block;">

                    <h3>Teljes körű biztosítás – teljes nyugalom</h3>
                    <p>Minden bérautónk rendelkezik <strong>kötelező felelősség- és Casco biztosítással</strong>,
                        valamint <strong>nemzetközi autóbiztosítással</strong> a gondtalan utazás érdekében.</p>
                    <h3>Korlátlan lehetőségek belföldön</h3>
                    <p>Magyarországon belül <strong>korlátlan kilométerhasználatot</strong> biztosítunk, így Ön szabadon
                        autózhat, ameddig csak szüksége van.</p>
                    <h3>Rugalmas, kényelmes kiszolgálás</h3>
                    <ul>
                        <li>
                            <p><strong>Ingyenes autókiszállítás</strong> vasút- és buszpályaudvarokra</p>
                        </li>
                        <li>
                            <p><strong>Házhoz szállítás, hozom-viszem szolgálat</strong> bármely megadott címre</p>
                        </li>
                        <li>
                            <p><strong>Reptéri autóátvétel éjjel-nappal</strong></p>
                        </li>
                    </ul>
                    <h3>Családbarát felszereltség</h3>
                    <ul>
                        <li>
                            <p><strong>Bébihordozó, gyerekülés, ülésmagasító</strong> kérésre díjmentesen</p>
                        </li>
                        <li>
                            <p><strong>Téli gumik és szezonális felkészítés</strong> minden autón</p>
                        </li>
                        <li>
                            <p><strong>Második és harmadik sofőr</strong> regisztrációja ingyenesen biztosított</p>
                        </li>
                    </ul>
                    <h3>Teljes szabadság – akár határon túl is</h3>
                    <ul>
                        <li>
                            <p><strong>Határátlépési engedély</strong> egyszerű ügyintézéssel</p>
                        </li>
                        <li>
                            <p><strong>Nonstop Europe Rental Car Assistance</strong> – 24 órás segélyszolgálat bárhol az
                                EU-ban</p>
                        </li>
                        <li>
                            <p><strong>Kötelező szervizeltetés lebonyolítása</strong> hosszabb bérlés esetén</p>
                        </li>
                    </ul>
                    <h3>Kiemelkedő rugalmasság és gyorsaság</h3>
                    <ul>
                        <li>
                            <p><strong>Expressz kiszállítás 1 órán belül</strong> Budapesten</p>
                        </li>
                        <li>
                            <p><strong>Non-stop autó visszavétel</strong> bármikor</p>
                        </li>
                        <li>
                            <p><strong>Díjmentes előfoglalás és lemondás</strong> – nincs kockázat</p>
                        </li>
                        <li>
                            <p><strong>Nincs apróbetűs rész vagy rejtett költség</strong> – nálunk minden átlátható</p>
                        </li>
                    </ul>
                    <h3>Prémium minőség – korrekt árakon</h3>
                    <ul>
                        <li>
                            <p><strong>Folyamatosan karbantartott, kiválóan felszerelt bérautók</strong></p>
                        </li>
                        <li>
                            <p><strong>Térítésmentes parkolási lehetőség</strong> a budapesti irodánkban</p>
                        </li>
                        <li>
                            <p><strong>Személyre szabott árak és kedvezmények</strong> visszatérő ügyfeleknek</p>
                        </li>
                        <li>
                            <p><strong>Barátságos, udvarias, segítőkész ügyfélszolgálat</strong></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="border border-red-500 rounded-lg mt-4">
            <button @click="open = (open === 3 ? null : 3)"
                class="w-full text-left px-4 py-2 bg-red-100 text-red-600 font-semibold flex justify-between items-center">
                <span>Mikor érdemes autóbérlés mellett dönteni?</span>
                <i :class="open === 3 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="open === 3" class="px-4 py-2 text-sm text-gray-700" x-cloak>
                <div id="accordion-887963891-content" class="accordion-inner"
                    aria-labelledby="accordion-887963891-label" style="display: block;">

                    <p>Az autókölcsönzés számos élethelyzetben nyújthat gyors és kényelmes megoldást.</p>
                    <p>🔧 <strong>Káresemény vagy hosszabb szerviz idejére</strong> – Ha saját járműve javításra szorul,
                        egy gyorsan elérhető, megbízható bérautó segít abban, hogy addig se kelljen lemondania a
                        mobilitásról.</p>
                    <p>🌍 <strong>Külföldi utazás előtt</strong> – Nyaralásra vagy üzleti útra indul? Egy jó állapotú,
                        rendszeresen karbantartott bérautóval nyugodtan autózhat, nem kell tartania egy esetleges
                        meghibásodástól hosszabb távon sem.</p>
                    <p>💒 <strong>Esküvőre, különleges alkalomra</strong> – Sokan választanak autóbérlést az esküvő
                        napjára, hiszen akár egyetlen napra is kibérelhető az álomautó, amely emlékezetessé teszi a nagy
                        pillanatokat.</p>
                    <p>✈️ <strong>Repülőtéri érkezés esetén</strong> – Ha repülővel érkezik Magyarországra, és az
                        országot kényelmesen, szabadon szeretné felfedezni, a bérautó tökéletes választás.</p>
                    <p>🏢 <strong>Céges autóhiány megoldására</strong> – Amennyiben a vállalati flotta nem elegendő egy
                        projekthez, rendezvényhez vagy ideiglenes feladathoz, az autókölcsönzés rugalmas és
                        költséghatékony alternatívát jelent.</p>
                </div>
            </div>
        </div>
        <div class="border border-red-500 rounded-lg mt-4">
            <button @click="open = (open === 4 ? null : 4)"
                class="w-full text-left px-4 py-2 bg-red-100 text-red-600 font-semibold flex justify-between items-center">
                <span>Miért jó választás az autóbérlés?</span>
                <i :class="open === 4 ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>
            <div x-show="open === 4" class="px-4 py-2 text-sm text-gray-700" x-cloak>
                <div id="accordion-294961793-content" class="accordion-inner"
                    aria-labelledby="accordion-294961793-label" style="display: block;">

                    <p>Amikor autója szervizbe kerül, a mobilitásról akkor sem kell lemondania. A csereautó szolgáltatás
                        kényelmes, rugalmas és pénztárcabarát megoldás a javítás idejére. Nézze meg, milyen előnyökkel
                        jár!</p>
                    <h3>🚗 Nem marad autó nélkül</h3>
                    <p>Akinek nincs másik autója otthon, de közlekednie kell – munkába, ügyintézni vagy családot
                        szállítani –, annak a csereautó <strong>azonnali segítség</strong>. A szervizelés ideje alatt is
                        teljes mozgásszabadságot élvezhet.</p>
                    <h3>🔁 Kipróbálhat más típusú autókat</h3>
                    <p>A csereautó egy lehetőség is lehet: ha más típusú, kategóriájú járművet kap,
                        <strong>költséghatékony módon ismerkedhet meg különböző modellekkel</strong>, ami jól jöhet egy
                        későbbi autóvásárlás előtt.
                    </p>
                    <h3>💸 Olcsóbb, mint alternatívák</h3>
                    <p>Taxira vagy egyéb megoldásra költeni drágább lehet, különösen több napos javítás esetén. A
                        csereautóval <strong>fix, előre ismert költségekkel</strong> számolhat, és ha hamarabb elkészül
                        az autója, egyszerűen visszaadja a bérautót – nincs felesleges kiadás.</p>
                    <h3>🕒 Saját időbeosztás szerint közlekedhet</h3>
                    <p>A csereautóval <strong>nem kell alkalmazkodnia menetrendekhez vagy más személyekhez</strong>. Ön
                        dönt, mikor indul, meddig marad, és merre megy – épp úgy, mintha a saját autóját használná.</p>
                    <h3>🌟 Alkalomhoz illő autó a mindennapokra</h3>
                    <p>Lehet, hogy csereautóként egy <strong>nagyobb, kényelmesebb</strong> járművet kap, ami segít a
                        család szállításában vagy a mindennapi feladatok elvégzésében. De választhat <strong>kompakt
                            modellt</strong> is városi közlekedéshez – attól függően, mire van szüksége.</p>
                    <h3>👨‍👩‍👧‍👦 Ha többen utaznak, még gazdaságosabb</h3>
                    <p>Ha a család vagy munkatársak is utaznak Önnel, a csereautó költsége könnyen
                        <strong>megosztható</strong>, így egy igazán kedvező megoldás minden érintett számára.
                    </p>
                    <h3>🤝 Nem kell mástól segítséget kérni</h3>
                    <p>Sokan nehezen kérnek kölcsön autót baráttól, ismerőstől. A csereautóval <strong>szívességek és
                            kellemetlenségek nélkül</strong> oldható meg a közlekedés.</p>
                    <h3>🧾 Nem érdemes második autót tartani emiatt</h3>
                    <p>Ha ritkán merül fel az autó kiesése, felesleges saját tartalék járművet fenntartani. A
                        csereautó-szolgáltatás ebben az esetben <strong>gyors, költséghatékony és stresszmentes
                            megoldás</strong>.</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h2 class="text-2xl font-bold text-red-600 mb-4">Autóbérlés rezerváció és információ</h2>
        <div class="text-sm text-gray-700">
            <p><strong>Fem-Cars Hungary Kft.</strong></p>
            <p>2083 Solymár, Mátyás Király út 45.</p>
            <p><span class="font-semibold">Telefon:</span> <strong>+36 70 378 8340 | 36 30 211 8545</strong></p>
            <p><span class="font-semibold">Nyitva tartás:</span> <strong>H-P: 8-17-ig</strong></p>
        </div>
    </div>
</div>
