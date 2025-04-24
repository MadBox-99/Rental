<!DOCTYPE html>
<html lang="hu">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Question</title>
        <style>
            body {
                font-family: DejaVu Sans;
                margin: 20px;
            }

            h1,
            h2 {
                color: #2c3e50;
            }

            ul {
                list-style-type: none;
                padding: 0;
            }

            li {
                background: #ecf0f1;
                margin: 5px 0;
                padding: 10px;
                border-radius: 5px;
            }

            .label {
                font-weight: bold;
                color: #2980b9;
            }
        </style>
    </head>

    <body>
        <header>
            <h1 style="text-align: center; font-size: 24px; font-weight: bold;">Egyedi Bérleti Szerződés <img
                    src="data:image/png;base64,{{ base64_encode(Vite::content('resources/img/logo.png')) }}"
                    alt="Fem Cars Logo" style="display: block; margin: 0 auto; width: 150px;"></h1>
            <p style="text-align: center; font-size: 14px;">............................számú GÉPJÁRMŰ BÉRLETI SZERZŐDÉS
            </p>

        </header>

        <section>
            <h2 style="font-size: 18px;">Amely létrejött egyrészről mint Bérbeadó:</h2>
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Név:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Fem-Cars Hungary Kft.</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Cégjegyzék sz.:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">13-09-153296</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Székhely:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">2085 Pilisvörösvár, Deák Ferenc utca
                        58.</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Adószám:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">23769807-2-13</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Telephely:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">2083 Solymár, Mátyás király utca 45.
                    </td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Eljáró személy:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Márton Tamás</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Képviseli:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Metzger András</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Tel. szám:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">+36-70-378-8340</td>
                </tr>
            </table>
        </section>

        <section>
            <h2 style="font-size: 18px;">másrészről:</h2>
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Cég név:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">&nbsp;</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Név:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Cégjegyzék sz.:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Születési hely, idő:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Székhely:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Anyja neve:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Adószám:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Szem. ig. száma:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Képviseli:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Jogosítvány száma:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Kapcsolattartó:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Cím:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">E-mail cím:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">E-mail cím:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Telefonszám:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Telefonszám:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
            </table>
        </section>

        <section>
            <h2 style="font-size: 18px;">mint Bérbe vevő között, az alábbiak szerint:</h2>
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Gyártmány:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">{{ $order->car->brand }}</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Rendszám:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">{{ $order->car->license_plate }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Típus/modell:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">{{ $order->car->model }}</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Forg. engedély szám:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Alvázszám:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">{{ $order->car->chassis_number }}</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Műszaki érvényesség:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">{{ $order->car->technical_validity }}
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Motorszám:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">{{ $order->car->engine_number }}</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Üzembe tartó:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Fem-Cars Hungary Kft.</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Gyártási év:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">{{ $order->car->year }}</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Induló km állás:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
            </table>
        </section>

        <section>
            <h2 style="font-size: 18px;">Bérleti díj és egyéb feltételek:</h2>
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Nettó bérleti díj:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Bérlet kezdete:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Emelt első bérleti díj:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Bérlet vége:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Bérleti futamidő:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Fizetési mód:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Max futás:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Díj fizetés:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Többletfutás nettó:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Letét/Kaució:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Alulfutás nettó:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;">Megjegyzés:</td>
                    <td style="border: 1px solid #000; padding: 5px; width: 25%;"></td>
                </tr>
            </table>
        </section>

        <section>
            <h2 style="font-size: 18px;">A bérleti díj szolgáltatás tartalmazza:</h2>
            <table style="width: 100%; border-collapse: collapse; font-size: 12px; text-align: center;">
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Gépjármű finanszírozás kamata és amortizációs
                        költségek</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Adminisztrációs és ügyintézési díjak</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Kötelező adók, járulékok, illetékek, biztosítások
                        díjai</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Országúti segélyszolgálat (assistance)</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Gyár által kötelezően előírt karbantartási és
                        javítási költségek</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Cseregépjármű átány</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Éves magyarországi autópálya díjat</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Téli-nyári gumicsere szerelési és tárolási
                        költséggel</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Közlekedési és egyéb bírságok díjait</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Hozom-viszem sofőrszolgálatot</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Casco önrészesedést 10%, de minimum 200.000 Ft.
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Fékbetét csere</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Féktárcsa csere</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Téli/nyári gumiabroncs cseréje</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">Defekt javítás + a hozzá tartozó hozom-viszem
                        szolgálatás</td>
                    <td style="border: 1px solid #000; padding: 5px;">tartalmazza</td>
                    <td style="border: 1px solid #000; padding: 5px;">nem tartalmazza</td>
                </tr>
            </table>
        </section>

        <footer>
            <p style="text-align: center; font-size: 10px;">Fem-Cars Hungary Kft. | 2083 Solymár, Mátyás király utca
                45.
                | femcars@femcars.hu</p>
        </footer>

        <div style="page-break-before: always;"></div>
        <div style="display: flex;">
            <h2 style="font-size: 12px; font-weight: bold; margin: 0;">Egyedi Bérleti Szerződés <img
                    src="data:image/png;base64,{{ base64_encode(Vite::content('resources/img/logo.png')) }}"
                    alt="Fem Cars Logo" style="width: 150px;"></h2>
        </div>
        <section>

            <p style="font-size: 10px; text-align: justify; margin-bottom: 5px;">
                Szerződő felek megállapodnak, Bérbeadó bérbe adja, Bérlő pedig bérbe veszi a fent részletezett
                gépjárművet annak tartozékaival és
                alkotórészeivel együttesen, a jelen szerződés 3. számú, elválaszthatatlan mellékletét képző
                „Átadás-átvételi jegyzőkönyv” -ben leírt
                állapotban, felszereltséggel és a tartozékkal.
            </p>
            <p style="font-size: 10px; text-align: justify; margin-bottom: 5px;">
                A Bérlő tudomásul veszi, hogy a gépkocsit kifejezetten tilos különösen:
            </p>
            <ol style="font-size: 10px; margin-bottom: 5px; padding-left: 20px;">
                <li>Másnak bérbe, illetve kölcsön adni, a bérleti szerződésen nem szereplő személynek a vezetést
                    a
                    Bérbeadó előzetes írásos
                    engedélye nélkül átengedni.</li>
                <li>Autóversenyzésre, vagy arra való felkészülésre (Edzés) használni.
                </li>
                <li>Másik jármű vontatására használni, kivéve ha a Bérbeadó kifejezetten vontatás céljára adta
                    bérbe.
                </li>
                <li>Hűtőfolyadék, kenőolajok elfolyása, ill. az ellenőrző műszerek tiltó jelzése esetén tovább
                    használni.</li>
                <li>Alkohol, gyógyszer vagy kábítószer befolyása alatt vezetni.</li>
                <li>A bérbeadó előzetes írásos engedélye nélkül a gépkocsit az Európai Unión kívülre, vagy a
                    biztosítási
                    feltételekben tiltott
                    országba külföldre vinni.</li>
            </ol>
            <p style="font-size: 10px; text-align: justify; margin-bottom: 5px;">
                Bérlő vállalja, hogy a gépkocsi állagát megóvja, a gépkocsit kívül és belül egyaránt esztétikus
                állapotban üzemelteti, tisztán tartja, a
                gépkocsiban nem dohányzik.
            </p>
            <h3 style="font-size: 12px; margin-bottom: 5px;">Nyilatkozatok:</h3>
            <p style="font-size: 10px; text-align: justify; margin-bottom: 5px;">
                A Bérlő tudomásul veszi, hogy a bérleti szerződés az Indikatív ajánlat kiállításakor érvényben
                lévő
                adatok alapján készült. Bérlő kijelenti,
                hogy a fentiekben rögzített adatokat, pénzügyi feltételeket átolvasták, értelmezték és
                aláírásukkal
                igazolják, hogy azok a szerződéskötési
                szándékuknak mindenben megfelelnek. Bérlő kijelenti, hogy a jelen okiratban foglalt,
                szerződéskötésre
                irányuló szándéka ajánlatnak
                minősül.
            </p>
            <p style="font-size: 10px; text-align: justify; margin-bottom: 5px;">
                A Bérlő kijelenti, hogy az 1.sz. melléklet Általános Szerződési Feltételeket átolvasták,
                értelmezték és
                megtárgyalták. Az ügyfél a
                dokumentumot a <a href="www.csereautoberles.hu" target="_blank">www.csereautoberles.hu
                </a>weboldalon
                elolvashatja vagy e-mail-re külön kérés eseték
                megküldik.
                A bérleti szerződés elválaszthatatlan mellékletét képezi a Bérbeadó által alkalmazott általános
                szerződési feltételt. A Bérlő elismeri, hogy a
                Bérbeadó lehetővé tette számára, hogy az általános szerződési feltételeket (továbbiakban ÁSZF) a
                szerződéskötést megelőzően
                feltételekről, amelyek lényegesen eltérnek a Polgári Törvénykönyv szabályaitól és ezeket a
                rendelkezéseket (pl., szerződés létrejötte,
                szerződéskötés helye és ideje, bérleti díj módosulása, bérleti díj fizetési kötelezettség,
                kockázat- és
                kárveszély viselés, szerződés
                felmondása, a kezesség szabályai) magukra nézve kötelezőnek ismerik el.
            </p>
            <p style="font-size: 10px; text-align: justify; margin-bottom: 5px;">
                Felek megállapodnak abban, hogy a szerződéskötés helyének a Bérbeadó székhelye minősül.
                Mellékletek: 1.sz. melléklet Általános Szerződési Feltételek, 2.sz. melléklet Átadás-átvételi
                jegyzőkönyv
                Bérbeadó tájékoztatja a Bérlőt, hogy a jelen szerződésben megadott adatai a 2016/679 EK rendelet
                (GDPR)
                6. cikk alapján a szerződés
                teljesítése érdekében, valamint a számlázás tekintetében jogszabályi kötelezettségből kezeli. Az
                esetleges károk, bírságok megtérítésének
                érdekében a Bérbeadó jogos érdekből kezeli az adatokat. Bérbeadó tájékoztatja a Bérlőt, hogy a
                szabálysértési-, és büntetőeljárásban,
                illetve más hatósági eljárásban a Bérbeadó az eljárás lefolytatójának a Bérlő adatait kiadni
                köteles.
                Bérbeadó adatkezelésre Adatvédelmi
                Tájékoztató vonatkozik, melynek a vonatkozó részeit a Bérlő megismerte és tudomásul vette
            </p>

            <p style="font-size: 10px; text-align: justify; margin-bottom: 5px;">
                Használó Jogosítvány bemutatásra került <input type="checkbox" style="margin-right: 5px;">
            </p>
            <p style="font-size: 10px; text-align: justify; margin-bottom: 5px; font-weight: bold;">
                A szerződés 3 oldalból áll, és 2 eredeti példányban készült. Amelyből a bérlő és a bérbeadó
                egy-egy
                eredeti példányt átvett és ezt
                aláírásával igazolja.
            </p>
            <table
                style="width: 100%; margin-top: 10px; font-size: 12px; border-collapse: collapse; border: 1px solid #000;">
                <tr>
                    <td style="width: 50%; text-align: center; border: 1px solid #000;">Bérbeadó:</td>
                    <td style="width: 50%; text-align: center; border: 1px solid #000;">Bérlő:</td>
                </tr>
                <tr>
                    <td style="width: 50%; text-align: center; padding-top: 30px; border: 1px solid #000;">
                        _________________________</td>
                    <td style="width: 50%; text-align: center; padding-top: 30px; border: 1px solid #000;">
                        _________________________</td>
                </tr>
            </table>
        </section>
        <footer>
            <p style="text-align: center; font-size: 10px;">Fem-Cars Hungary Kft. | 2083 Solymár, Mátyás király utca
                45.
                | femcars@femcars.hu</p>
        </footer>
    </body>

</html>
