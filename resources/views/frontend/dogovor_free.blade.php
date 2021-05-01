<!DOCTYPE html>
<html lang="en">
<head>
	<x-whoami />
	<title>Pdf</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style>

	body { font-family: DejaVu Sans }

	p{
		font-size: 12px;
		margin: 0;
	}
	h5 {
		margin-bottom: 5px;
	}
	main{
		padding: 30px;
		text-align: justify;
	}
	.ewq h5, table h5 {
		margin: 0;
	}
	table {
		border-collapse: collapse;
	}
	table, th, td {
		border: 1px solid black;
	}

	</style>
</head>
<body>
	<main>
			<h4 align="center">Москва тадбиркорлик академияси буйича маслаҳат <br> хизматлари кўрсатиш шартномаси № C/{{ $student->id }}</h4>

			<p style="margin-left: 20px;float: left;">{{ date('« d» m Y', strtotime($student->service_date)) }} й.</p><p style="margin-right: 20px;float: right;">Тошкент  ш. </p>
			<br><br>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;« ASIA CAMPUS » МЧЖ  Бош директори Бегимкулов И.А Устав асосида фаолият юритувчи, келгусида «БАЖАРУВЧИ» деб номланувчи, бир томондан  ва жисмоний шахс сифатида {{ $student->fullName }} паспорт серияси  {{ $student->passport_id }} {{ $student->passport_date }}й {{ $student->passport_iib }} томонидан берилган,  келгусида «БУЮРТМАЧИ» деб номланувчи иккинчи томондан,  умумий тартибда «Томонлар» деб номланувчилар,  алоҳида эса «Томон» деб  номланувчи,  мазкур шартномани қуйидагилар юзасидан туздик:</p>

			<h5 align="center"> 1. Шартнома предмети</h5>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1 Бажарувчи, Буюртмачига  мазкур шартноманинг 1.2-бандида кўрсатилган масалалар буйича бепул маслаҳат (ахборот-маълумот) хизматлари кўрсатишни ўз зиммасига олади,  Буюртмачи эса ўз навбатида ушбу хизматларни қабул қилиш ва белгиланган мажбуриятларни бажариши лозим.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2.Мазкур шартнома предмети Бажарувчи томонидан Буюртмачига Россия Федерациясида жойлашган Москва тадбиркорлик академияси (кейинчалик Чет элдаги ОТМ) “Инсон омилларини бошқариш”, “Тадбиркорлик”, “Проектларни бошқариш”, “Маркетинг” йўналишлари  буйича қуйидаги хизматлар кўрсатишдан иборатдир:</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Чет элдаги ОТМ и бакалавриат ва магистратура йўналишлари, факултет йўналишлари бўйича ўқишга кириш шартлари юзасидан маслаҳатлар бериш, хамда мавжуд маълумотига оид  ҳужжатларга таалуқли бўлган меъёрий талаблар ҳақида маълумотлар бериш;</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Чет элдаги ОТМига ўқишга кириш истагида бўлган абитурентлар учун кундузги, сиртқи ва масофавий ўқишга кириш шартлари, Чет элдаги ОТМнинг дарс ўтиш тиллари ва бошқа фанлар бўйича билимларига қўйилган талаблари ҳақида маълумотлар бериш;</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Чет элдаги ОТМига кириш учун талаб қилинадиган ҳужжатларни йиғиш ва расмийлаштириш  тартиби масалаларига оид маслаҳатлар бериш; </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Абитуриент номидан ва унинг манфаатида  чет элдаги ОТМ билан абитурентни ўқишга кириши масаласида музокаралар ўтказиш, унинг хужжатларини жамлаш ва чет элдаги ОТМга юбориш ёки абитуриент номидан ва унинг манфаатида бошқа барча таълим муассасаларидан ҳужжатларини қайтариш жараёни бўйича маслаҳат бериш;</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Чет элдаги ОТМига online (онлайн ) тарзда ҳужжат топширилишига кўмаклашиш; </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Чет элдаги ОТМига абитуриент ҳужжатларини асл нусхасини етказиш талаб қилинган ҳолларда, Буюртмачи билан ҳамкорликда ушбу ҳужжатларни асл нусхасини етказиш ва топширишда кўмаклашиш;</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-  Чет элдаги ОТМи томонидан абитуриентнинг  ўзининг  давлатида олган  таълим тўғрисидаги ҳужжатларини тан олиш учун  нострификациядан ўтказиш ҳақида буюртмачига тушунтириш бериш;</p>	
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- абитуриент танлаган йуналишлар буйича презентациялар ташкил этиш ва утказиш;</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Абитурент талабаликка қабул қилингандан сўнг ўз устида мунтазам ишлаб, семестрларини аъло баҳоларга ёпган тақдирда, талабага келгуси семестрни <b>грант</b> (контракт туловисиз) асосида давом эттириш бўйича маълумотлар тақдим этиш.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Мазкур шартнома асосида чет элдаги ОТМ да ўқишга қабул қилинган Буюртмачиларга/талабаларга онлайн ва офлайн амалиёт ўташлари учун Ўзбекистон Республикаси худудидаги юридик шахслар билан шартнома имзолаши юзасидан кўмаклашиш; </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Мазкур шартнома асосида Россия Федерациясида жойлашган Москва тадбиркорлик академиясининг қуйидаги </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <b>“Инсон омилларини бошқариш”</b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <b>“Тадбиркорлик”</b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <b>“Проектларни бошқариш”</b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <b>“Маркетинг”</b> </p>
			<p>йўналишлари бўйича ўқишга кириб, ушбу ОТМни тамомлаб, дипломлари билан Ўзбекистон Республикасига қайтган Буюртмачини ишга жойлаштириш бўйича амалий ёрдам бериш.</p>
			<h5 align="center">2.Томонларнинг хуқуқ ва мажбуриятлари.</h5>
			<div class="ewq">
			<h5>«Бажарувчи» ўз зиммасига қўйидаги мажбуриятларни олади:</h5>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1. Мазкур шартнома бажарилиши чоғида «Буюртмачи» дан  олинган маълумотлар бўйича катъий сир сақлаш;</p>	

			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.2. Мазкур шартноманинг 1.2-бандида назарда тутилган масалалар бўйича тўлиқ, объектив ва ҳақиқий маълумот, ахборот ва маслаҳатлар бериш, шу билан биргаликда Россия давлатида ўқишни тамомлаб келгандан сўнг ишга жойлаштириш бўйича керакли амалий маслаҳатлар бериш.</p>	
			<h5>Бажарувчи қўйидаги  ҳуқуқга эга:</h5>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3. Агар Буюртмачи томонидан мазкур шартнома имзолангандан кейин шартномани бир томонлама бекор килиб, ўқишини бошқа олий таълим муассасаларига кўчириб, бошқа ОТМларини тамомлаганда шартноманинг 3.2 банди бўйича компенсация ундириш.</p>	
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.  Мазкур шартнома бўйича Бажарувчи ўз мажбуриятларини учинчи шахсларнинг кучи билан ҳам амалга ошириш ҳуқуқига эга.</h5>
			<h5>Буюртмачи ўз зиммасига қўйидаги мажбуриятларни олади:</h5>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.5.  Керакли  маълумотларни олиш учун Бажарувчини ўз вактида барча зарурий ҳужжатлар (фуқаролик паспорти, диплом, диплом илова ёки аттестат, форма-086, ОИТВ ҳақида маълумотнома, расм) ва бошқа талаб қилинган ҳужжатлар билан таъминлаш. </p>			
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.6.  Чет элдаги ОТМ томонидан абитуриентнинг  ўзининг  давлатида олинган  таълим тўғрисидаги ҳужжатларини тан олиш учун  зарурий  нострификациядан  ўтказишни таъминлаш.</p>
			<h5>Буюртмачи қўйидаги  ҳуқуқга эга:</h5>
			<p>2.7.  Мазкур шартноманинг 1.2-бандида назарда тутилган масалалар бўйича тўлик, объектив ва ҳақиқий маслаҳат ва ахборотлар олиш.</p>
			</div>
			<h5 align="center">3.Шартнома қиймати ва ҳисоб-китоб тартиби</h5>
			<p>3.1.&nbsp;&nbsp;&nbsp;Бажарувчи томонидан кўрсатиладиган ҳизматлар миқдори, келгусида «шартнома микдори»,

				@if($student->service_amount)
					{{ number_format($student->service_amount, 0, '.', ' ') }}
				@else
					{{ number_format($student->speciality->service_sum, 0, '.', ' ') }}
				@endif

				 ({{ $student->speciality->service_sum_name }}) сўм бўлиб, акция доирасида  Буюртмачига хизматлар БЕПУЛ  кўрсатилади.</p>
			<p>3.2.&nbsp;&nbsp;&nbsp;Бироқ Буюртмачи шартнома шартларини бажармаган ёки лозим даражада бажармаган тақдирда, ундан шартноманинг 4.2.-бандида белгиланган чораларни кўриш ҳуқуқига эга. </p>
			<h5 align="center">4.Томонларнинг  жавобгарлиги</h5>
			<p>4.1.&nbsp;&nbsp;&nbsp;Мазкур шартнома бўйича хизматлар бажарилмаган тақдирда томонларнинг жавобгарлиги амалдаги қонунчилик талаблари асосида юзага келади. </p>
			<p>4.2.&nbsp;&nbsp;&nbsp;Мазкур шартнома имзолангандан кейин Буюртмачи томонидан мазкур шартномани бир томонлама бекор килиб, мазкур шартнома доирасидаги чет элдаги ОТМ да ўқишни давом эттирмаса (ўқишни Ўзбекистон Республикаси ҳудудидаги олий таълим муассасалари кўчирса) компанияга етказилган моддий ва маънавий зарар (

				@if($student->service_amount)
					{{ number_format($student->service_amount, 0, '.', ' ') }}
				@else
					{{ number_format($student->speciality->service_sum, 0, '.', ' ') }}
				@endif

				 ({{ $student->speciality->service_sum_name }})сўм) бўйича жавобгарликка тортилади. </p>
			<p>4.3.&nbsp;&nbsp;&nbsp;Куйидаги ҳолатларда шартнома бўйича хизматлар бажарилмаганлиги Бажарувчининг жавобгарлигини юзага келтирмайди: </p>
			<p>&nbsp;&nbsp;&nbsp;- Буюртмачи томонидан ўз вақтида барча зарурий ҳужжатлар ва маълумотномалар билан таъминланмаганда;</p>
			<p>&nbsp;&nbsp;&nbsp;- Буюртмачи томонидан Ўзбекистон Республикаси ҳудудидан ташқаридаги давлат олий таълим муассасалари томонидан абитуриентнинг  ўзининг  давлатида олинган  таълим тўғрисидаги ҳужжатларини тан олиш учун зарурий нострификациядан ўтказишни таъминламаганда;</p>
			<p>&nbsp;&nbsp;&nbsp;- Буюртмачи Чет элдаги ОТМлари билан таълим туўғрисидаги шартномаларни имзоламаганда ва бошқа ҳолатларда.</p>
			<p>4.4.&nbsp;&nbsp;&nbsp;Буюртмачига учинчи шахслар томонидан ўз вақтида ҳужжатлар тақдим қилинмаганлиги учун Бажарувчи жавобгар бўлмайди.  </p>
			<h5 align="center">5. Форс мажор холатлари.</h5>
			<p>5.1 Мазкур шартнома тузилиши чоғида  назарда тутилмаган ва шартнома тузилгандан сўнг вужудга келган  енгиб бўлмайдиган кучлар таъсири тўғридан-тўғри ёки бошқача усулда мазкур шартноманинг бажарилишига тўсқинлик қилса ва уларни бартараф этиш чоралари бўлмаса (топилмаса), томонлар мазкур  шартнома бўйича мажбуриятлар қисман ёки тўлик бажарилмагани учун жавобгарликдан озод этиладилар. </p>
			<p>5.2. Мазкур шартноманинг 5.1-бандида кўрсатилган ҳолатларга қўйидагилар киради: -уруш эълон қилиниши ва ҳарбий ҳаракатлар бошланиши, табиий офатлар, эпидемия ва пандемиялар,  мазқур шартноманинг предметига оид ҳуқумат қарорлари ва ҳоқазолар.</p>
			<p>5.3  Мазкур ҳолатлар вужудга келган ҳолда  томонлар 10 (ун) календар куни мобайнида ёзма шаклда иккинчи  томонни ушбу ҳолатлар, уларнинг тури ва  давомийлиги тўғрисида ҳабардор қилишлари шарт.  Агарда ушбу томон мазкур ҳолатларга дуч келганда иккинчи томонни ҳабардор қилмаса, ушбу ҳолатларга асосланишдан маҳрум қилинади. <br>
			Шартноманинг мазкур банди билан назарда тутилган ҳолатлар вужудга келганда ва шартноманинг 5.3-бандидаги талаблар бажарилган холда, томонлар шартномавий мажбуриятларнинг бажариш муддатларини мазкур ҳолатларнинг  давомийлиги даврига узайтирадилар.</p>
			<p>5.4 Агарда қайд этилган ҳолатлар 3 (уч) ойдан кўп муддатда давом этаверса, томонлар биргаликда мазкур шартнома бўйича келгусидаги юридик муносабатларни белгилайдилар.</p>
			<p>5.5  Мазкур шартномани бажариш чоғида вужудга келадиган низо ва зиддиётлар имкон даражада томонлар ўртасида музокара йўли билан ҳал қилинади.</p>
			<p>5.6  Музокара йўли билан ҳал қилинмаган тақдирда низо ва зиддиётлар суд тартибида Шайхонтохур туманлараро Фукаролик ишлари бўйича судида кўриб чиқилади.</p>
			<h5 align="center">6. Қушимча шартлар</h5>
			<p>6.1  Шартнома томонлар имзолаганидан сўнг кучга киради. </p>
			<p>6.2  Мазкур шартноманинг амал қилиш муддати 31.12.2021 йилгача.</p>
			<p>6.3  Мазкур шартноманинг 1.2, 2.3, 3.2, 4.2 бандларида назарда тутилган ишга жойлаштиришга кўмаклашиш ва компенсация ундириш билан боғлиқ қисмлари ушбу бандлар амалда бажарилмагунга қадар белгиланади.</p>
			<p>6.4 Томонлар ўртасида мавжуд бўлган, аммо мазкур шартномада назарда тутилмаган барча оғзаки келишувлар мазкур шартнома имзоланганидан сўнг ўз кучини йўқотади.</p>
			<p>6.5  Мазкур шартномада назарда тутилмаган масалалар  Ўзбекистон Республикасининг амалдаги қонунчилиги асосида ҳал қилинади.</p>
			<p>6.6 Шартномага кўшимча ва ўзгаришлар ёзма шаклда томонлар имзолаган ҳолда ҳақиқий ҳисобланади.</p>
			<p>6.7 Мазкур шартнома бир ҳил юридик кучга эга  икки нусҳада тузилди ва ҳар бир томонга бир нусхадан берилди.</p>
			<br><br><br><br><br><br><br>
			<h5 align="center">7. Томонларнинг манзиллари, реквизитлари ва имзолари</h5>
			<table>
				<tbody>
					<tr>
						<td >
							<h5>« ASIA CAMPUS » МЧЖ</h5>  
							<p>Манзил:   Тошкент шахар</p>  
							<p>Шайхонтохур тумани Фуркат кучаси 16-уй.</p>
		                    <p>Банк: АТИБ «Ипотека банк»  Шайхонтохур филиали</p>
		                	<p>х/р 20208000905338583001</p>
		                	<p>ИНН: 308116441</p>
		                	<p>МФО: 00425
		                	<p>Менеджер тел:             @if(isset($student->manager->phone))  {{ getNormalPhone($student->manager->phone) }} @endif</p>
		                	<p>Шартнома булими тел: 97 735 00 94</p></td>
						<td>
							<table width="100%">
								<tr><td><h5 align="center" style="margin-bottom: 10px;">Ф.И.Ш.</h5></td></tr>
								<tr><td><p>{{ $student->fullName }} паспорт <br> серияси {{ $student->passport_id }} <br> {{ $student->passport_date }}й <br> {{ $student->passport_iib }}</p><br><br></td></tr>
								<tr><td><p>Тел : +998{{ getNormalPhone($student->phone) }}</p><br><br></td></tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<img src="img/contract41.jpg" alt="">
						</td>
						<td>
							<p align="center" style="font-size: 10px;">Шартноманинг барча бандлари билан тўлиқ танишиб чиқдим ва у кирилл алифбосидан тузилганлигидан хабардорман.</p>
							<br><br><br>
							<p align="center">______________________________ <br> (имзо) {{ $student->second_name }} {{ $student->name }}</p>
						</td>
					</tr>
				</tbody>
			</table>
	</main>
</body>
</html>