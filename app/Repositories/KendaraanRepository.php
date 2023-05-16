namespace App\Repositories;

use App\Models\Kendaraan;

class KendaraanRepository
{
    public function all()
    {
        return Kendaraan::all();
    }

    public function find($id)
    {
        return Kendaraan::find($id);
    }

    public function create(array $data)
    {
        return Kendaraan::create($data);
    }

    public function update($id, array $data)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->update($data);
        return $kendaraan;
    }

    public function delete($id)
    {
        return Kendaraan::destroy($id);
    }
}
