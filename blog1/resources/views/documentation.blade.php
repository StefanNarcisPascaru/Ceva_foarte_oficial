@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><p class="bg-primary"><h2>Api documentation</h2></p></div>
                <div class="panel-body">
                <p class="bg-primary"><h3><span><strong>Examples:</strong></span></h3></p>

         		<p class="text-info"><a href="http://localhost/bog1/blog1/public/slideapi/getAll">http://localhost/bog1/blog1/public/slideapi/getAll</a></p>
         		<p class="text-info"><a href="http://localhost/bog1/blog1/public/slideapi/getApi?q=php&lang=en&format=ppt&take=5">http://localhost/bog1/blog1/public/slideapi/getApi?q=php&lang=en&format=ppt&take=5</a></p>
         		
         		<p class="bg-primary"><h3><span><strong>Required parameters:</strong></span></h3></p>
				<ul>
					<li><p class="text-info"><strong>q</strong>: id of the slideshow to be fetched.</p></li>
				</ul>

				<p class="bg-primary"><h3><span><strong>Optional parameters:</strong></span></h3></p>
				<ul>
				<li><p class="text-info"><strong>lang</strong>: Language of slideshows (default is English, 'en') ('es':Spanish,'pt':Portuguese,'fr':French,'it':Italian,'nl':Dutch, 'de':German,'zh':Chinese,'ja':Japanese,'ko':Korean,'ro':Romanian)</p></li>
				<li><strong><p class="text-info">format</strong>: File extension to search on. Default is "pdf". (Some example file extensions you can use include 'pdf':PDF, 'ppt':PowerPoint, 'odp':Open Office, 'pps':PowerPoint Slideshow, 'pot':PowerPoint template)</p></li>
				<li><strong><p class="text-info">take</strong>: Number of results to return, default is 10</p></li>
				</ul>
				
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
