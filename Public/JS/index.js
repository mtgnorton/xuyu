$(document).ready(function(){

  var playlist = [{
      title:"假如爱有天意",
      artist:"",
      mp3:"/xuyu/Public/music/love.mp3",
      poster: "images/1.jpg"
    },{
      title:"Cro Magnon Man",
      artist:"The Stark Palace",
      mp3:"/xuyu/Public/music/love.mp3",
      poster: "images/2.jpg"
    },{
      title:"Bubble",
	  artist:"The Stark Palace",
      mp3: "/xuyu/Public/music/love.mp3",
      poster: "images/3.jpg"
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