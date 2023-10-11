async function fetchProduits() {
    const response = await fetch("../../service/data.json");
    const data = await response.json();
    return data.products;
}

async function displayProduits() {
    const dataProduct = await fetchProduits();

    console.log(dataProduct);

    let productsHTML = '';

    for (let i = 0; i < dataProduct.length; i++) {
        let produit = `
            <div class="col-lg-3 col-md-3 m-3 col-sm-3 card" style="width: 18rem;">
                <img src="${dataProduct[i].image}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">${dataProduct[i].name}</h5>
                    <p class="card-text">${dataProduct[i].description}</p>
                    <a href="#" class="btn btn-primary">Voir</a>
                </div>
            </div>
        `;

        productsHTML += produit;

    }

    document.getElementById('listeProduit').innerHTML = productsHTML;
}

displayProduits();