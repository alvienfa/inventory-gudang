<style>
    .card {
        display:flex;
        flex-direction: column;
        border-radius: 5px;
        padding: 1rem;
        background-color: rgba(164,164,164,0.8);
        font-weight: 700;
        height:200px;
    }
    .card-body{
        font-weight: 700;
        display: grid;
        grid-template-columns: 100px 100px;
    }
    .title{
        padding-left: 1.5rem;
    }
    .grid-col-1{
        width: 100%;
    }
</style>

<div class="row">
    <div class="title">
        <h3>Logs</h3>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="grid-col-1 bg-green"><i class="fa fa-arrow-up green"></i>1</div>
                <div class="grid-col-1 bg-red"><i class="fa fa-arrow-up green"></i>2</div>
                <div class="grid-col-1 bg-green"><i class="fa fa-arrow-up green"></i>3</div>
                <div class="grid-col-1 bg-red"><i class="fa fa-arrow-up green"></i>4</div>
            </div>
        </div>
    </div>
</div>