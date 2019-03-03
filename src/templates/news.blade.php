
@extends('layout')

@section('title', 'News')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 py-5" id="content">
      <h2>Latest news</h2>
    </div>
  </div>
</div> 

<script type="module">
document.addEventListener('DOMContentLoaded', function() {
  const client = contentful.createClient({
    space: 's0ljm28rcwdf',
    environment: 'master',
    accessToken: 'aee68d919f9e8d3ec12aee90df4a90a129d86631980ab98f272a88be50f163be'
  })

  client.getEntries({
    content_type: 'news',
    order: '-sys.createdAt'
  })
  .then(function(response) {
    var holder = document.getElementById('content');
    const options = {
      renderNode: {
        ["embedded-asset-block"]: function(node){
          return renderContentfulImage(node, 150, {"class":"img-thumbnail", "data-toggle":"modal", "data-target":"#imageModal", "data-image":node.data.target.fields.file.url, style:"cursor:pointer"});
        }
      }
    };
    for(var i = 0; i < response.items.length; i++){
      var item = response.items[i] 
      var headline = item.fields.headline
      var article = documentToHtmlString(item.fields.article, options)
      holder.insertAdjacentHTML('beforeEnd', `<div class="news-item border-bottom py-4">
        <h3>${headline}</h3>
        ${article}
      </div>`);
    }
  })
  .catch(console.error)
})
</script>

@include('modal')

@endsection
