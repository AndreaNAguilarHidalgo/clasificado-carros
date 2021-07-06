<div class="container">
    <form class="container" action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="align-items-center">
            <div class="row">
                <div class="card bg-light col-lg-12 col-md-6">
                    <div class="card-body">
                        <div class="row col-lg-12 col-md-6 col-sm-4">
                            <div class="col-md-6 col-sm-3">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" id="nombre" class="@error('nombre') is-invalid @enderror">
                                    @error('nombre')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <!--FIN FORM-GROUP-->
                                <div class="form-group">
                                    <label for="email">Correo: </label>
                                    <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror">
                                    @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <!--FIN COL-MD-6-->

                            <div class="col-md-6 col-sm-3">
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input type="text" name="apellido" id="apellido" class="@error('apellido') is-invalid @enderror">
                                    @error('apellido')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div><!-- FORM-GROUP -->
                                <!--FIN FORM-GROUP-->
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" class="@error('telefono') is-invalid @enderror">
                                    @error('telefono')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div><!-- FIN FORM-GROUP -->
                            </div>
                            <!--FIN COL-MD-8-->
                        </div>
                        <!--FIN ROW-->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" class="@error('descripcion') is-invalid @enderror"></textarea>
                                    @error('descripcion')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group" style="text-align: end">
                                    <input type="submit" name="enviar" class="btn btn-primary" value="Enviar">
                                </div>
                            </div>
                        </div>
                    </div><!-- FIN CARD-BODY-->
                </div><!-- FIN CARD-->
            </div><!-- FIN ROW -->
        </div><!-- FIN ROW h-100-->
    </form><!-- FORM-->
</div>
