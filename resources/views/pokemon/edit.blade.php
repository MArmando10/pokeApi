<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
    @if (Session::has('message'))
    <div class="alert alert-info">{{Session::get('message')}}</div>
    @endif

    <div class="card">
    <div class="card-header">
        <h2>Datos de la venta</h2>
    </div>
    <div class="card-body">
        <form class="" method="" action="">
            @method('PUT')
            @csrf
            {{$errors}}
                        

                        <div class="form-group col-md-12">
                        <h3>Datos de la venta</h3>

                            <div class="form-row">
                            <div class="form-group col-md-4">

                            <label class="Nombres"></label>
                        
                            <select class="vendedor" id="NombreV" name="NombreV">
                            
                            @foreach($vendedor as $u)d

                            <option value="{{$u->id}}"></option>
                            
                            @endforeach
                            
                            </select>
                            
                            <p class="inputError"></p>
                        
                        </div>  

                                            
                                
            </div>
        </div>
            
    </div>

                    <div class="d-flex justify-content-between mb-8"><label>
                        <a class="btn btn-primary" role="button" href="{{route('pokemon.index')}}"><i class="fas fa-arrow-left"></i> Cancelar </a></label>
                    </div>
                    <div> <label><button type="submit" class="btn btn-primary"><i class="fas fa-save" id="btnComprobar" href="{{route('pokemon.index')}}"></i> Guardar y continuar</button></label>
                    </div>
            </div>
        </form>
</body>
</html>

