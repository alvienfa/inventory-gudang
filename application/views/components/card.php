<style>
    .card {
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        padding: 1rem;
        background-color: rgba(164, 164, 164, 0.8);
        font-weight: 700;
        height: 200px;
    }

    .card-body {
        position: relative;
        display: flex;
        font-weight: 700;
        /* overflow: hidden; */
        height: 100px;
        background: aqua;
    }

    .title {
        padding-left: 1.5rem;
    }
</style>

<div class="row">
    <div class="title">
        <h3>Logs</h3>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 bg-green">
                        <div class="">
                            test
                        </div>
                    </div>
                    <div class="col-md-6 bg-red">
                        <div class="">
                        test
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>