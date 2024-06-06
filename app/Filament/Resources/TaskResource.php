<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Enums\TaskType;
use App\Enums\TaskStatus;
use App\Enums\PaymentStatus;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->placeholder('Nama lengkap')
                        ->required(),
                    Forms\Components\TextInput::make('role')
                        ->label('Nama Pekerjaan')
                        ->placeholder('Nama pekerjaan'),
                    Forms\Components\RichEditor::make('address')
                        ->label('Address')
                        ->placeholder('Nama pekerjaan'),
                    Forms\Components\Select::make('type')
                        ->label('Divisi Kerja')
                        ->options([
                            TaskType::DepartmentSatu->value => TaskType::DepartmentSatu->value,
                            TaskType::DepartmentDua->value => TaskType::DepartmentDua->value,
                            TaskType::DepartmentTiga->value => TaskType::DepartmentTiga->value,
                            TaskType::DepartmentEmpat->value => TaskType::DepartmentEmpat->value,
                        ]),
                    Forms\Components\DateTimePicker::make('visit_at')
                        ->label('Tanggal Masuk'),
                    Forms\Components\DateTimePicker::make('post_at')
                        ->label('Tanggal Posting'),
                    Forms\Components\RichEditor::make('description')
                        ->label('Laporan'),
                    Forms\Components\Select::make('status')
                        ->label('Status Proyek')
                        ->options([
                            TaskStatus::Todo->value => TaskStatus::Todo->value,
                            TaskStatus::OnProgress->value => TaskStatus::OnProgress->value,
                            TaskStatus::Done->value => TaskStatus::Done->value,
                        ]),
                    Forms\Components\Select::make('payment_status')
                        ->label('Status Gaji')
                        ->options([
                            PaymentStatus::Paid->value => PaymentStatus::Paid->value,
                            PaymentStatus::Unpaid->value => PaymentStatus::Unpaid->value,
                        ]),
                    Forms\Components\TextInput::make('linkedin_link')
                        ->placeholder('https://www.linkedin.com/in/...'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
