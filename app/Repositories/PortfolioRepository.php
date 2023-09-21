<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PortfolioRepository
{
    // public function update(Country $country, array $data): Country
    // {
    //     $country->update([
    //         'name' => $data['name'],
    //         'code' => $data['code'],
    //         'iso2_code' => $data['iso2_code'],
    //         'prefered_date_format' => $data['prefered_date_format'],
    //         'is_active' => $data['is_active'],
    //     ]);

    //     $country->timezone()->associate($data['timezone_id']);
    //     $country->region()->associate($data['region_id']);
    //     $country->people()->sync($data['peopleIds']);

    //     $country->save();

    //     return $country;
    // }

    // public function store(array $data): Country
    // {
    //     $country = new Country([
    //         'name' => $data['name'],
    //         'code' => $data['code'],
    //         'iso2_code' => $data['iso2_code'],
    //         'prefered_date_format' => $data['prefered_date_format'],
    //         'is_active' => $data['is_active'], ]);

    //     $country->timezone()->associate($data['timezone_id']);
    //     $country->region()->associate($data['region_id']);

    //     $country->save();

    //     $country->people()->sync($data['peopleIds']);

    //     return $country;
    // }

    // public function getById(int $id): Country
    // {
    //     return Country::findOrFail($id);
    // }

    // public function getPaginated(
    //     ?string $sortField = 'id',
    //     ?string $sortDirection = 'desc',
    //     ?array $filters = [],
    //     ?int $perPage = 10,
    // ): LengthAwarePaginator {
    //     return Country::query()
    //         ->filter($filters)
    //         ->orderBy($sortField, $sortDirection)
    //         ->paginate($perPage);
    // }

    // public function getAllCountryCodes(): array
    // {
    //     return Country::orderBy('name')
    //         ->pluck('name', 'code')
    //         ->toArray();
    // }

    // public function getAllCountryIds(): array
    // {
    //     return Country::orderBy('name')
    //         ->pluck('id')
    //         ->toArray();
    // }

    // public function asSelectOptions(): array
    // {
    //     return Country::orderBy('name')
    //         ->pluck('name', 'id')
    //         ->toArray();
    // }

    // public function getActiveCountries(): Collection
    // {
    //     return Country::active()
    //         ->orderBy('name')
    //         ->get();
    // }
}
