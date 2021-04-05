<html>
<head>

<script>
function getdetails(){
	tyear={ 'data' : String(document.getElementById("year").value)};
    var year =JSON.stringify(tyear);
    //alert(year);

   var t= JSON.stringify(year);
  if (document.getElementById("vivod")	) {document.getElementById("vivod").remove(); var a=document.getElementsByTagName("p");
  			a[0].remove();}

        var text;
        console.log(fetch("DB_moves",{method:"PUT",body:t, headers: {'Content-Type': 'application/json;charset=utf-8'}}).then(response=> {return response.json()} ));

        	text=fetch("DB_moves",{method:"PUT",body: year}).then(response=> {return response.json()} );
    
        	 text.then(function(text){  
        	let div = document.createElement('p');
        				div.Id="usings";
        		div.innerHTML="<H1>  Пользователи "+text.length+"<H1>";
        	
        		var table = document.createElement("table");
        		table.id="vivod";
        		document.body.append(div);
        		
        		for (let i = 0; i < text.length; i++) { 
  				
  				let  cellnum=0;
  				if (i==0) {
  						console.log(cellnum);
  						var tr=table.insertRow(0);
  						for(key in text[i]){
  						var tr1=tr.insertCell();
  						tr1.innerHTML=key;
  						}
  					}
  		
  				var tr=table.insertRow(i+1);
  				for(key in text[i]){
  					let r=cellnum;
  					var tr1=tr.insertCell();
  						tr1.innerHTML = text[i][key];
  					cellnum++;
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