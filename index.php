<html>
<head>

<script>
function getdetails(){
	year= JSON.stringify({ 'data' : String(document.getElementById("year").value)});
        var json_data;
        	json_data=fetch("DB_moves",{method:"PUT",body: year}).then(response=> {return response.json()} );
        	 json_data.then(function(json_data){  
        		if(json_data.length>0){
        		html=[];
        		html.push("<H1>  Пользователи "+json_data.length+"<H1>");
        		html.push("<table> <tr>")
        		for (let i = 0; i < json_data.length; i++) { 
  				if (i==0) {
  						for(key in json_data[i]){
  						html.push("<td>"+key+"</td>");
  						}
  						html.push("</tr>");
  					}
  				html.push("<tr>");
  				for(key in json_data[i])
  				{
  						html.push( "<td>"+json_data[i][key]+"</td>");
  				};
  				html.push("</tr>");
  				
			}
			html.push("</table>");
			
			document.getElementById("output").innerHTML=html.join('');
		}
});

}
</script>
</head>
<body>
               <input type="text" name="year" id="year" />
               <input type="submit" name="submit" id="submit" value="submit" onClick = "getdetails()" />
               <h1 id="usnum"> </h1>
    <div id="output" class="output"></div>
</body>
</html>