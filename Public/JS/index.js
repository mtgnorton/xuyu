$(document).ready(function(){
var musicName=$("#musicName").attr("value");

var musicPath=$("#musicPath").attr("value");

  var playlist = [{
      title: musicName,
      artist: "",
      mp3: musicPath,
      poster: "images/1.jpg"

  }];
  
  var cssSelector = {
    jPlayer: "#jquery_jplayer",
    cssSelectorAncestor: ".music-player"
  };
  
  var options = {
    swfPath: "Jplayer.swf",
    supplied: "ogv, m4v, oga, mp3"
  };
  
  var myPlaylist = new jPlayerPlaylist(cssSelector, playlist, options);
  
});