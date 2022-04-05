<form action="{{ $formAction }}" enctype="multipart/form-data" class="needs-validation" method="post" novalidate>
    @csrf
    <div class="form-row">
        <div class="col-md-4 px-md-4">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="rubro">Rubro</label>
                    <select class="form-control" id="rubro" name="tkn_rubro" onchange="setSubRubros(this.value)"
                        required>
                        <option value="">Seleccionar</option>
                        @foreach ($rubros as $item)
                            <option value="{{ $item->tkn }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Sub Rubros</label>
                    <select class="form-control" id="subrubro" name="tkn_subrubro" required>
                        <option value="">Selecciona un rubro</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="correo">Correo Contacto</label>
                    <input type="email" class="form-control"
                        id="correo" name="correo"
                        value="{{old('correo')}}"
                        placeholder="Correo contacto" autocomplete="off" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="web">Dirección Web</label>
                    <input type="url" class="form-control"
                        id="web" name="web"
                        value="{{old('web')}}"
                        placeholder="Link Web" autocomplete="off" required>
                </div>
            </div>
        </div>
        <div class="col-md-4 px-md-4">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" required>{{old('descripcion')}}</textarea>
                </div>
            </div>
        </div>
        @if ($fl_anuncio)
            <div class="col-md-4 px-md-4">
                <div class="form-row">
                    @foreach ($redes as $item)
                        <div class="form-group col-md-12">
                            <label for="{{$item->tkn}}">{{$item->nombre}}</label>
                            <input type="url" class="form-control"
                                id="{{$item->tkn}}" name="redes[{{$item->nombre}}]"
                                value="{{old('')}}"
                                placeholder="Link {{$item->nombre}}" autocomplete="off">
                        </div>
                    @endforeach
                    <div class="form-group col-md-12">
                        <label for="instagram">Instagram</label>
                        <input type="url" class="form-control"
                            id="instagram" name="instagram"
                            value="{{old('instagram')}}"
                            placeholder="Link Instagram" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="linkedin">LinkedIn</label>
                        <input type="url" class="form-control"
                            id="linkedin" name="linkedin"
                            value="{{old('linkedin')}}"
                            placeholder="Link Linkedin" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="facebook">Facebook</label>
                        <input type="url" class="form-control"
                            id="facebook" name="facebook"
                            value="{{old('facebook')}}"
                            placeholder="Link Facebook" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="twitter">Twitter</label>
                        <input type="url" class="form-control"
                            id="twitter" name="twitter"
                            value="{{old('twitter')}}"
                            placeholder="Link Twiiter" autocomplete="off">
                    </div>
                </div>
            </div>
        @endif
    </div>
    @if ($fl_anuncio)
        <div class="form-row mb-4">
            <div class="col-md-4 px-md-4">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Logo</label>
                        <div class="custom-file">
                            <input class="custom-file-input form-control" type="file"
                                accept=".jpg,.png,.jpge,.JPG,.PNG,.JPEG" id="logo" name="logo" aria-describedby="logo"
                                required>
                            <label class="custom-file-label" for="logo">Adjuntar Logo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Galería</label>
                        <div class="custom-file">
                            <input class="custom-file-input form-control" type="file"
                                accept=".jpg,.png,.jpge,.JPG,.PNG,.JPEG" id="galeria" name="galeria[]"
                                aria-describedby="galeria" multiple required>
                            <label class="custom-file-label" for="galeria">Adjuntar Imágenes</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Archivos</label>
                        <div class="custom-file">
                            <input class="custom-file-input form-control" type="file"
                                accept=".doc,.docx,.pdf,.ppt,.pptx,.xls,.xlsx" id="archivos" name="archivos[]"
                                aria-describedby="archivos" multiple>
                            <label class="custom-file-label" for="archivos">Adjuntar Archivos</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="form-row">
        <div class="form-group col-12 px-md-4">
            <button type="submit" class="btn btn-violet fs2">Configurar Ficha</button>
        </div>
    </div>
</form>
