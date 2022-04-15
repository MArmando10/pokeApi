<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Datos de apiPokemon</title>
</head>
<body>

    <div class="row  border p-5 mt-5 ">
        <div class=" col-sm-8 col-md-12">

    
            <h1 >Datos de POKEMONES</h1>
            <table class=" table table-striped">
                <thead class="thead-dark">    
                    <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>foto</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($poke as $p)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$poke}}</td>
                            <td></td>
                            <td></td>
                      

                        <td>
                <form action="" method="" id="">
                    @csrf
                    @method('DELETE')

                 
                    <a class="btn-sm btn-info botonInput" href=""><i class="far fa-edit"></i>Editar</a>
            

                  <button type="submit" class="btn-sm btn-danger " onclick="return confirmSweetAlertDestroy('Desactivar','Realmente quieres desactivar','warning','desactivado','Se desactivo.','destroy')"><i class="fas fa-user-slash"></i>Eliminar</button>


                 </td>     
                 
                </form>
                </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>
