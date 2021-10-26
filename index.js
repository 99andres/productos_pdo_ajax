 let editar=document.getElementsByClassName('editar')
//  Object.values(editar).forEach(element => {
    Array.prototype.forEach.call(editar,element => {
     element.onclick=function(e){
         e.preventDefault();
         let valor={valor:e.target.dataset.id}
        //  console.log(e.target.dataset.id);
        let peticion =new XMLHttpRequest();
        peticion.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                if(this.responseText!=""){
					let datos=JSON.parse(this.responseText)
					activando(datos,e.target.dataset.id);
				}  

            }
        }
        peticion.open("POST","http://localhost/productos_PDO/editar.php",true);
        peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        peticion.send(JSON.stringify(valor));
         }
 });

    
var modal = document.getElementById("tvesModal");
var btn = document.getElementById("btnModal");
var span = document.getElementsByClassName("close")[0];
var body = document.getElementsByTagName("body")[0];
var parametro = document.getElementById("parametro");
function activando(datos,id){	
	console.log(id)
	let nombre=document.getElementById("nombre")
	let precio=document.getElementById("precio")
	nombre.value= datos.nombre
	precio.value=datos.precio
	parametro.value=id
	modal.style.display = "block";

	body.style.position = "static";
	body.style.height = "100%";
	body.style.overflow = "hidden";
}


span.onclick = function() {
	modal.style.display = "none";

	body.style.position = "inherit";
	body.style.height = "auto";
	body.style.overflow = "visible";
}

window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";

		body.style.position = "inherit";
		body.style.height = "auto";
		body.style.overflow = "visible";
	}
}
		