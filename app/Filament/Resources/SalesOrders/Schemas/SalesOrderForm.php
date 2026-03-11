<?php

namespace App\Filament\Resources\SalesOrders\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SalesOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            \Filament\Forms\Components\Select::make('customer_id')
            ->relationship('customer', 'name')
            ->searchable()
            ->required(),
            DatePicker::make('order_date')
            ->required(),
            TextInput::make('total_amount')
            ->required()
            ->numeric()
            ->default(0),
            \Filament\Forms\Components\Select::make('status')
            ->options([
                'Pending' => 'Pending',
                'Paid' => 'Paid',
                'Cancelled' => 'Cancelled',
            ])
            ->required()
            ->default('Pending'),
        ]);
    }
}
