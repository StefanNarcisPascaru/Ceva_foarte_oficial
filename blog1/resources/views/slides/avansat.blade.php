@extends ('layouts.app')

@section('title')
	Slides
@stop

@section('content')
<?php $langs= array(
    'af' => 'Afrikaans',
    'ak' => 'Akan',
    'ar' => 'Arabic',
    'as' => 'Assamese',
    'be' => 'Belarusian',
    'bg' => 'Bulgarian',
    'bo' => 'Tibetan Standard, Tibetan, Central',
    'bs' => 'Bosnian',
    'ca' => 'Catalan; Valencian',
    'co' => 'Corsican',
    'cs' => 'Czech',
    'da' => 'Danish',
    'de' => 'German',
    'en' => 'English',
    'es' => 'Spanish; Castilian',
    'et' => 'Estonian',
    'eu' => 'Basque',
    'fj' => 'Fijian',
    'fr' => 'French',
    'ga' => 'Irish',
    'gd' => 'Scottish Gaelic; Gaelic',
    'gl' => 'Galician',
    'gn' => 'GuaranÃ­',
    'gu' => 'Gujarati',
    'hi' => 'Hindi',
    'hr' => 'Croatian',
    'ht' => 'Haitian; Haitian Creole',
    'hu' => 'Hungarian',
    'hy' => 'Armenian',
    'id' => 'Indonesian',
    'is' => 'Icelandic',
    'it' => 'Italian',
    'iu' => 'Inuktitut',
    'ja' => 'Japanese (ja)',
    'jv' => 'Javanese (jv)',
    'ka' => 'Georgian',
    'kg' => 'Kongo',
    'ko' => 'Korean',
    'kr' => 'Kanuri',
    'ks' => 'Kashmiri',
    'ku' => 'Kurdish',
    'la' => 'Latin',
    'lb' => 'Luxembourgish, Letzeburgesch',
    'lg' => 'Luganda',
    'lt' => 'Lithuanian',
    'lv' => 'Latvian',
    'mg' => 'Malagasy',
    'mh' => 'Marshallese',
    'mi' => 'Maori',
    'mk' => 'Macedonian',
    'mn' => 'Mongolian',
    'mt' => 'Maltese',
    'nb' => 'Norwegian BokmÃ¥l',
    'nd' => 'North Ndebele',
    'ne' => 'Nepali',
    'nl' => 'Dutch',
    'no' => 'Norwegian',
    'pa' => 'Panjabi, Punjabi',
    'pl' => 'Polish',
    'pt' => 'Portuguese',
    'ro' => 'Romanian, Moldavian, Moldovan',
    'ru' => 'Russian',
    'sk' => 'Slovak',
    'sl' => 'Slovene',
    'sq' => 'Albanian',
    'sr' => 'Serbian',
    'sv' => 'Swedish',
    'tr' => 'Turkish',
    'ts' => 'Tsonga',
    'tt' => 'Tatar',
    'tw' => 'Twi',
    'ty' => 'Tahitian',
    'uk' => 'Ukrainian',
    'vi' => 'Vietnamese',
    'yi' => 'Yiddish',
    'yo' => 'Yoruba',
    'za' => 'Zhuang, Chuang',
    'zh' => 'Chinese',
    'zu' => 'Zulu',
);
?>
	<div class="container">
  <div class="jumbotron">
    <h1>Search on SlideShare</h1>      
    <p>Discover, Share, and Present presentations and infographics with the world's largest professional content sharing community.</p>
  </div>
 {!! Form::open(array('route' => 'slide.api.av','method' => 'post','class'=>'form-horizontal', 'role'=>'form')) !!}
 	<div class="form-group">
		{{Form::label('search','Search slides about:', array('class'=>'control-label col-sm-2', 'for'=>'tag'))}}
		<div class="col-sm-10">
    		{{Form::text('tag_slideuri',null,array('class'=>'form-control', 'id'=>'tag'))}}
    	</div>
    </div>
    <div class="form-group">
		{{Form::label('language','Language:', array('class'=>'control-label col-sm-2'))}}
		<div class="col-sm-10">
    		{{Form::select('lang',$langs,  array('en'))}}
    	</div>
    </div>
    <div class="form-group">
		{{Form::label('format','Format:', array('class'=>'control-label col-sm-2', 'for'=>'tag'))}}
		<div class="col-sm-10">
    		{{Form::select('format',array('pdf'=>'Portable Document Format','ppt'=>'Power Point','pptx'=>'Power Point Template XML'))}}
    	</div>
    </div>
    <div class="form-group">
		{{Form::label('upload','Upload time:', array('class'=>'control-label col-sm-2', 'for'=>'tag'))}}
		<div class="col-sm-10">
    		{{Form::select('upload_time',array('week'=>'Last week','month'=>'Last month','year'=>'Last Year','Any'))}}
    	</div>
    </div>

    {{Form::submit('Search',array('class' => 'btn btn-succes btn-lg btn-block'))}}
 {!! Form::close() !!}
@endsection


 
