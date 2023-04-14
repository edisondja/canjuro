
window.onload=function(){


 
    var login = document.querySelector('#login');
    var dominio = document.querySelector('#dominio').value;
    var public_post = document.querySelector('#public_post');
    var foto_perfil = document.querySelector('#foto_perfil').value;
    var nombre_usuario = document.querySelector('#nombre_usuario').value;

    
    login.addEventListener('click',function(){


        alertify.confirm('Login',`
        <div><hr/>
            <input type='text' id='usuario' class='form-control'/><hr/>
            <input type='password' id='clave' class='form-control'/><hr/>
        </div>
        `,function(){

            let usuario =  document.querySelector('#usuario').value;
            let clave =  document.querySelector('#clave').value;

            let FormDatas = new FormData();
            FormDatas.append('action','login');
            FormDatas.append('usuario',usuario);
            FormDatas.append('clave',clave);

           // localStorage.setItem('myCat', 'Tom');
           //const cat = localStorage.getItem('myCat');
           //localStorage.clear();
            /*
            headers: {
                    'Content-Type': 'multipart/form-data',
                    'Authorization': `Bearer ${token}`
                     
                  }
            */

            axios.post(`controllers/actions_board.php`,FormDatas).then(data=>{

   
                location.href=dominio;
                localStorage.setItem('token',data.data.token);
                localStorage.setItem('usuario',data.data.usuario);

                //alert(localStorage.getItem('token'));
                /*localStorage.setItem('name',token);
                localStorage.setItem('token',token);
                localStorage.setItem('token',token);*/

            }).catch(error=>{

                alertify.warning(error);

            });


        },function(){});
      


    });




    var subir_imagen = document.querySelector('#upload_image');

  

    subir_imagen.addEventListener('click',function(){

     
            document.querySelector('#upload_images').click();

    });



    var subir_imagen =  document.querySelector('#upload_images');
    var count = 0;
    subir_imagen.addEventListener('change',data=>{

            console.log(data.target.files);
            
            let files = data.target.files.length;

            var formData = new FormData();


            for(i=0;i<files;i++){

                console.log(data.target.files[i].name);
                var media = URL.createObjectURL(data.target.files[i])
                count++;


                formData.append("media",data.target.files[i]);

                if(data.target.files[i].type=='image/jpeg' || data.target.files[i].type=='image/png'){

                    
                    document.querySelector('#multimedia_view').innerHTML+=`
                    <figure id='fig${i}'>
                    <figcaption><i class="fa-solid fa-delete-left" style='float:right' id='${i}'></i></figcaption>
                    <img src='${media}' style='margin:2px;height:130px; width:130px;'>
                    </figure>`;

                   
                }else{

                    document.querySelector('#multimedia_view').innerHTML+=`
                    <figure id='fig${i}'>
                    <figcaption><i class="fa-solid fa-delete-left" style='float:right' id='${i}'></i></figcaption>
                    <video src='${media}' controls style='margin:2px;height:130px;width:130px;'></video>
                    </figure>
                 `;
                    
                }


                formData.forEach(data=>{

                    console.log(data);


                });
            }


            let figure = document.querySelectorAll('figcaption');

            figure.forEach(data=>{

                    
                data.addEventListener('click',data=>{

                        document.querySelector(`#fig${data.target.id}`).style.display='none';

                        
                });

            });



    });


    function subir_imagen(){


        var formData = new FormData();
        var imagefile = document.querySelector('#file');
        formData.append("image", imagefile.files[0]);
        axios.post('upload_file', formData, {
            headers: {
            'Content-Type': 'multipart/form-data'
            }
        })


    }


    var singout = document.querySelector('#singout');

    singout.addEventListener('click',function(){
        
        localStorage.clear();
        let FormDatas = new FormData();
        FormDatas.append('action','sigout');


        axios.post(`${dominio}/controllers/actions_board.php`,FormDatas).then(data=>{

            console.log(data.data);
            location.href=dominio+"/controllers";

        }).catch(error=>{

            alertify.warning(error);

        });



    });

}


