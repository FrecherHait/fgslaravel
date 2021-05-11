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
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input name="title" value="{{ $item->title }}"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="slug">ID</label>
                                <input name="slug" value="{{ $item->id }}"
                                       id="slug"
                                       type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="slug">Идентификатор</label>
                                <input name="slug" value="{{ $item->slug }}"
                                       id="slug"
                                       type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Жанр</label>
                                <select name="category_id"
                                        id="category_id"
                                        class="form-control"
                                        placeholder="Выберите жанр"
                                        required>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if($categoryOption->id == $item->category_id) selected @endif>
                                            {{ $categoryOption->id }} . {{ $categoryOption->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description"
                                          id="description"
                                          class="form-control"
                                          rows="3">
                                    {{ old('description', $item->description) }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">Ссылка</label>
                                <textarea name="link"
                                          id="link"
                                          class="form-control">
                                    {{ old('link', $item->link) }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
