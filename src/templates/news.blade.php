
@extends('layout')

@section('title', 'News')

<?php

$pageSize = 5;
$allowScroll = false;

$client = new \Contentful\Delivery\Client($contentfulApiKey, $contentfulSpaceId, $contentfulEnvironment);
$query = new \Contentful\Delivery\Query();
$query->setContentType('news')
		->orderBy('-sys.createdAt')
		->setLimit($pageSize);

$items = $client->getEntries($query);
if(sizeof($items) === $pageSize) $allowScroll = true;

use Contentful\RichText\NodeRenderer\NodeRendererInterface;
use Contentful\RichText\Node\NodeInterface;
use Contentful\RichText\Node\EmbeddedAssetBlock;
use Contentful\RichText\RendererInterface;

if(! class_exists('NewsImageRenderer')){
	class NewsImageRenderer implements NodeRendererInterface{
		public function supports(NodeInterface $node) :bool {
			return $node instanceof EmbeddedAssetBlock;
		}

		public function render(RendererInterface $renderer, NodeInterface $node, array $context = []) :string{
			$src = $node->getAsset()->getFile()->getUrl();
			return sprintf('<img src="%s?w=150" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="%s" style="cursor:pointer" />', $src, $src);
		}
	}
}
$renderer = new \Contentful\RichText\Renderer();
$renderer->pushNodeRenderer(new NewsImageRenderer());

?>

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 py-5" id="content">
			<h2>Latest news</h2>
			@forelse($items as $item)
			<div class="news-item border-bottom py-4"><h3>{{ $item->getHeadline() }}</h3>{!! $renderer->render($item->getArticle()) !!}</div>
			@empty
			<div class="news-item border-bottom py-4">Sorry no news just now - please come back later</div>
			@endforelse
    </div>
	</div>
  <div class="row text-center"><img src="/assets/images/ajax-loader.gif" class="d-none" id="newsloader" style="margin:1em auto"/></div>
</div> 

<script type="module">
document.addEventListener('DOMContentLoaded', function() {
	var pageNumber = 1;
	var allowScroll = {{ $allowScroll }} ;
	const pageSize = {{ $pageSize }}
	const holder = document.getElementById('content');
	const loader = document.getElementById('newsloader');

	const client = contentful.createClient({
		space: '{{ $contentfulSpaceId }}',
		environment: '{{ $contentfulEnvironment  }}',
		accessToken: '{{ $contentfulApiKey }}'
	});
	const renderOptions = {
		renderNode: {
			["embedded-asset-block"]: function(node){
				var f = node.data.target.fields;
				return `<img src="${f.file.url}?w=150" alt="${f.title}" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="${f.file.url}" />`;
			}
		}
	};
	
	document.addEventListener('scroll', function(){
		var lastElement = document.querySelector('#content div:last-child');
		var lastElementOffset = lastElement.offsetTop - lastElement.clientHeight;
		var pageOffset = window.pageYOffset + window.innerHeight;

		if(allowScroll && pageOffset > lastElement.offsetTop + lastElement.clientHeight + 250){
			console.log('loading')
			loadMoreNews();
		}
	})
	
	function loadMoreNews() {
		allowScroll = false;
		loader.classList.remove('d-none');
		client.getEntries({
			content_type: 'news',
				order: '-sys.createdAt',
				limit: pageSize,
				skip: pageNumber * pageSize
		})
		.then(function(response) {
			for(var i = 0; i < response.items.length; i++){
				var headline = response.items[i].fields.headline
				var article = documentToHtmlString(response.items[i].fields.article, renderOptions)
				holder.insertAdjacentHTML('beforeEnd', `<div class="news-item border-bottom py-4">
					<h3>${headline}</h3>
					${article}
					</div>`);
			}
			if(response.items.length === pageSize) {
				pageNumber++;
				allowScroll = true;
			}
			loader.classList.add('d-none');
		})
		.catch(console.error)
	}
})
</script>

@include('modal')

@endsection
