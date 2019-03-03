/**
 * functions for handling images from contentful
 */
const renderContentfulImage = function(node, width, attributes){
  var width = width !== null ? "?w=" + parseInt(width) : '';
  var attributesStr = "";
  for(var i=0; i < Object.keys(attributes).length; i++){
    var attKey = Object.keys(attributes)[i];
    attributesStr += (attKey + '="' + attributes[attKey] + '"');
  }
  return `<img src="${node.data.target.fields.file.url}${width}" alt="${node.data.target.fields.title}" ${attributesStr} />`;
}


