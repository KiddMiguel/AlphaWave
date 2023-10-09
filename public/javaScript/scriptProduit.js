let data;
async function produits(data) {
    const response = await fetch("../../service/data.json");
    data = await response.json();
    data = JSON.parse(data.products);
    return data;
}
//Recupération produits




function recupItems(dataProduct) {
    let title = document.getElementById("title");
    for (let i = 0; i < dataProduct.length; i++) {
        console.log(dataProduct[i]);
        let produit = `
        <div class="col-lg-3 col-md-3 col-sm-3 card" style="width: 18rem;">
                        <img src="/public/images/produit1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" id="title">${dataProduct[i].name}</h5>
                            <p class="card-text" id="description">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Voir</a>
                        </div>
        </div>
        `;


        // document.getElementById('title').textContent = dataProduct[i].name;
        // document.getElementById('description').textContent = dataProduct[i].description;
    }
}