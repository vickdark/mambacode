@php
    // Decorative Laravel code drifting upward; each column repeats its snippet so it covers tall sections.
    $columns = [
        ['color' => '#c1529d', 'duration' => 38, 'lines' => [
            'public function store(VentaRequest $request)',
            '{',
            '    $venta = Venta::create($request->validated());',
            '    $venta->items()->createMany($request->items);',
            '',
            '    Inventario::descontar($venta);',
            '    event(new VentaRegistrada($venta));',
            '',
            '    return new VentaResource($venta);',
            '}',
            '',
        ]],
        ['color' => '#74afdf', 'duration' => 46, 'lines' => [
            'public function asignar(Viaje $viaje, Conductor $conductor)',
            '{',
            '    $vehiculo = $conductor->vehiculoDisponible();',
            '',
            '    $viaje->update([',
            "        'conductor_id' => \$conductor->id,",
            "        'vehiculo_id' => \$vehiculo->id,",
            "        'estado' => 'en_ruta',",
            '    ]);',
            '',
            '    RastrearVehiculo::dispatch($vehiculo);',
            '',
            '    return new ViajeResource($viaje);',
            '}',
            '',
        ]],
        ['color' => '#9d4f9c', 'duration' => 34, 'lines' => [
            '$reservas = Reserva::query()',
            "    ->with('huesped', 'habitacion')",
            "    ->whereDate('llegada', '>=', today())",
            "    ->where('estado', 'activa')",
            '    ->latest()',
            '    ->paginate(20);',
            '',
        ]],
        ['color' => '#74afdf', 'duration' => 50, 'lines' => [
            'class EnviarRecordatorioCita implements ShouldQueue',
            '{',
            '    public function handle(): void',
            '    {',
            '        $this->cita->paciente->notify(',
            '            new RecordatorioCita($this->cita)',
            '        );',
            '    }',
            '}',
            '',
        ]],
        ['color' => '#c1529d', 'duration' => 42, 'lines' => [
            'php artisan make:model Activo -mfc',
            'php artisan migrate --force',
            'php artisan queue:work',
            '',
            "Schema::create('activos', function (Blueprint \$table) {",
            '    $table->id();',
            "    \$table->foreignId('usuario_id')->constrained();",
            "    \$table->string('serial')->unique();",
            '    $table->timestamps();',
            '});',
            '',
        ]],
    ];
@endphp

<div {{ $attributes->class('code-rain') }} aria-hidden="true">
    @foreach ($columns as $column)
        @php($block = implode("\n", array_merge(...array_fill(0, 4, $column['lines']))))
        <div style="color: {{ $column['color'] }}; animation-duration: {{ $column['duration'] }}s; animation-delay: -{{ $loop->index * 7 }}s">{{ $block }}
{{ $block }}</div>
    @endforeach
</div>
