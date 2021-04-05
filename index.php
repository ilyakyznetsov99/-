<html>
<head>

<script>
function getdetails(){
if (document.getElementById("output")) {
//после нажатия на кнопку дописывались новые теги , засоряя страницу, потому здесь и проверка на существованиеэтих элементов
	document.getElementById("output").remove(); 
	var a=document.getElementsByTagName("p");
  	a[0].remove();
  }
	year= JSON.stringify({ 'data' : String(document.getElementById("year").value)});//переменная года,конвертируемая в json формат
        var json_data;
        	json_data=fetch("DB_moves",{method:"PUT",body: year}).then(response=> {return response.json()} );
        	 json_data.then(function(json_data){  
        	let div = document.createElement('p');//создание тега куда вносится количество пользователей
        		div.Id="count_users";
        		div.innerHTML="<H1>  Пользователи "+json_data.length+"<H1>";
        		var table = document.createElement("table");
        		table.id="output";
        		document.body.append(div);
        		for (let i = 0; i < json_data.length; i++) { 
  				if (i==0) {
  						var head_of_table=table.insertRow(0);
  						for(key in json_data[i]){
  						var cells_of_head=head_of_table.insertCell();
  						cells_of_head.innerHTML=key;
  						}
  					}
  				var body_off_table=table.insertRow(i+1);
  				for(key in json_data[i])
  				{
  					var cells_of_body=body_off_table.insertCell();
  						cells_of_body.innerHTML = json_data[i][key];
  				};
  				
}
document.body.append(table);
});

}
</script>
</head>
<body>
               <input type="text" name="year" id="year" />
               <input type="submit" name="submit" id="submit" value="submit" onClick = "getdetails()" />
               <h1 id="usnum"> </h1>
    <div id="msg"></div>
</body>
</html>