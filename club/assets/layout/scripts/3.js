var items = [
{id:0,value:10,text:""},
  {id:1,value:40,text:""},
  {id:2,value:50,text:""}];
items.forEach(function(item){
 var progressBarWidth = item.value * $("#progress"+item.id).width() / 100;
$("#progress"+item.id)
    .children().animate({ width: progressBarWidth}, 100).text(item.value +"%");   
  $("#progress"+item.id +" span").text(item.text);
});

$(".progress-bar").click(function(){
  var id = $(this).attr("id");
  var itemID = id.split("progress")[1];
  if(items[itemID].value == 100){
    return;
  }
  items[itemID].value +=1;
  items.forEach(function(item){
    if(item !== items[itemID]){
      if(item.value == 0){
        return;
      }
      item.value -=1;
  var progressBarWidth = item.value * $("#progress"+item.id).width() / 100;
  $("#progress"+item.id)
    .children().animate({ width: progressBarWidth}, 400).text(item.value + "%");
 $("#progress"+item.id).find("span").text(item.text);
    }
  });
  var progressBarWidth = items[itemID].value * $("#progress"+itemID).width() / 100;
  $("#progress"+itemID)
    .children().animate({ width: progressBarWidth}, 200).text(items[itemID].value + "%");
 $("#progress"+itemID).find("span").text(items[itemID].text);
});
