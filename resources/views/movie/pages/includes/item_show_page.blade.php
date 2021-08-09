@php
    /** @var \App\Models\MovieCategory $item */
    /** @var \Illuminate\Support\Collection $categoryList */
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="cart-title"></div>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <h3>{{ $item->title }}</h3>
                            </div>
                            <div class="img">
                                <img src="{{ old('img', $item->img) }}" width="320" height="480">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Жанр</label>
                                <h4>{{$item->category->title}}</h4>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <h5>{{ old('description', $item->description) }}</h5>
                            </div>
                            <div class="form-group">
                                <label for="link">Смотреть онлайн</label>
                            </div>
                            <div id="player">
                                <script src="https://frechergamestudio.ga/public/playerjs.js"></script>
                                <script language="JavaScript">
                                    var player = new Playerjs({id:"player", title:"Милый дом", file:"{{ old('link', $item->link) }}"});
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
