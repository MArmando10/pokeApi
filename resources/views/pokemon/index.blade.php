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




    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">





<style>
    body {
        overflow-x: hidden;
    overflow-y: hidden;
  background: rgb(85, 144, 189);
  background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0.1, 0)), url('https://cdn.slidesharecdn.com/ss_thumbnails/pokemons-110928133507-phpapp01-thumbnail-4.jpg?cb=1317217001');
        background-size: cover;
        background-repeat:no-repeat;
  );
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    font-family: "Oswald", sans-serif;
    }

h1 {
  color: white;
}

.pokemon-container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 30px;
  width: 80%;
  margin-left: auto;
  margin-right: auto;
}

.pokemon-block,
.pokemon-block-back {
  border-radius: 100px;
  padding: 10px;
  background-color: white;
  background-color: #1532;
  border: double;
}


.pokemon-block p {
  margin: 15px;
  color: white
}

.name {
  text-transform: capitalize;
  font-weight: bold;
  font-size: 1.2rem;
}

#spinner {
  display: none;
  position: absolute;
  top: 50%;
  left: 50%;
}

.pagination {
  width: 90%;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 50px;
}

.pokemon-block-back {
  transform: rotateY(180deg);
  position: absolute;
  top: 0%;
} 

.stat-container {
  display: grid;
  grid-template-columns: 1fr 2fr;
  text-align: left;
}
</style>


    <title>Datos de apiPokemon</title>
</head>
<body>

    <div class="row  border p-5 mt-5 ">
        <div class=" col-sm-6 col-md-12">

    
            <!-- <h1 >Datos de POKEMONES</h1> -->
            <h1 class="title">Datos de POKEMONES</h1>
            
        <div class="pokemon-container">
            <!-- dentro va los selectores de anterior y siguiente -->
        </div>
    <!-- paginar -->
    <nav class="pagination" aria-label="..." style="margin: 10px 0 0 50%;">
        <ul class="pagination">
          <li class="page-item" id="previous">
            <a class="page-link" href="#" tabindex="-1">Anterior</a>
          </li>
          <li class="page-item" id="next">
            <a class="page-link" href="#">Siguiente</a>
          </li>
        </ul>
      </nav>
      <!-- termina paginación -->
    <div id="spinner" class="spinner-border text-light" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

            <!-- insertar el script -->
             <script src="./script.js"></script>
        </div>
    </div>

    <hr>



    <script>
const pokemonContainer = document.querySelector(".pokemon-container");
const spinner = document.querySelector("#spinner");
const previous = document.querySelector("#previous");
const next = document.querySelector("#next");

let limit = 8;
let offset = 1;

previous.addEventListener("click", () => {
  if (offset != 1) {
    offset -= 9;
    removeChildNodes(pokemonContainer);
    fetchPokemons(offset, limit);
  }
});

next.addEventListener("click", () => {
  offset += 9;
  removeChildNodes(pokemonContainer);
  fetchPokemons(offset, limit);
});

function fetchPokemon(id) {
  fetch(`https://pokeapi.co/api/v2/pokemon/${id}/`)
    .then((res) => res.json())
    .then((data) => {
      createPokemon(data);
      spinner.style.display = "none";
    });
}

function fetchPokemons(offset, limit) {
  spinner.style.display = "block";
  for (let i = offset; i <= offset + limit; i++) {
    fetchPokemon(i);
  }
}

function createPokemon(pokemon) {
  const flipCard = document.createElement("div");
  flipCard.classList.add("flip-card");

  const cardContainer = document.createElement("div");
  cardContainer.classList.add("card-container");

  flipCard.appendChild(cardContainer);

  const card = document.createElement("div");
  card.classList.add("pokemon-block");

  const spriteContainer = document.createElement("div");
  spriteContainer.classList.add("img-container");

  const sprite = document.createElement("img");
  sprite.src = pokemon.sprites.front_default;

  spriteContainer.appendChild(sprite);

  const number = document.createElement("p");
  number.textContent = `#${pokemon.id.toString().padStart(3, 0)}`;

  const name = document.createElement("p");
  name.classList.add("name");
  name.textContent = pokemon.name;

  card.appendChild(spriteContainer);
  card.appendChild(number);
  card.appendChild(name);

  const cardBack = document.createElement("div");
  cardBack.classList.add("pokemon-block-back");

//   cardBack.appendChild(progressBars(pokemon.stats));

  cardContainer.appendChild(card);
  cardContainer.appendChild(cardBack);
  pokemonContainer.appendChild(flipCard);
}

function progressBars(stats) {
  const statsContainer = document.createElement("div");
  statsContainer.classList.add("stats-container");


  return statsContainer;
}

function removeChildNodes(parent) {
  while (parent.firstChild) {
    parent.removeChild(parent.firstChild);
  }
}

fetchPokemons(offset, limit);

    </script>
</body>

</html>
