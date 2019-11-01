<div class="card">
    <table class="table table-hover shopping-cart-wrap">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col" width="120">Quantity</th>
                <th scope="col" width="120">Price</th>
                <th scope="col" width="200" class="remove text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <figure class="media">
                        <div class="remove img-wrap"><img src="assets/images/mala.png" class="img-thumbnail img-sm"></div>
                        <figcaption class="media-body">
                            <h6 class="title text-truncate">Nome do produto</h6>
                            <dl class="param param-inline small">
                                <dt>Tipo do produto:</dt>
                                <dd>10 litros</dd>
                            </dl>
                            <dl class="param param-inline small">
                                <dt>Cor: </dt>
                                <dd>Azul</dd>
                            </dl>
                        </figcaption>
                    </figure>
                </td>
                <td>
                    <select class="remove form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                    <?php echo(y) ?>

                </td>
                <td>
                    <div class="price-wrap">
                        <var class="price">R$ 10,00</var>
                        <small class="text-muted">por dia</small>
                    </div>
                </td>
                <td class="remove text-right">
                    <a class="btn btn-outline-danger"> X Remove</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>