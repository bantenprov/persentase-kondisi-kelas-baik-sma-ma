<?php namespace Bantenprov\PerKKBSmaMa\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\PerKKBSmaMa\Facades\PerKKBSmaMa;

/* Models */
use Bantenprov\PerKKBSmaMa\Models\Bantenprov\PerKKBSmaMa\PerKKBSmaMa as PdrbModel;
use Bantenprov\PerKKBSmaMa\Models\Bantenprov\PerKKBSmaMa\Province;
use Bantenprov\PerKKBSmaMa\Models\Bantenprov\PerKKBSmaMa\Regency;

/* etc */
use Validator;

/**
 * The PerKKBSmaMaController class.
 *
 * @package Bantenprov\PerKKBSmaMa
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PerKKBSmaMaController extends Controller
{

    protected $province;

    protected $regency;

    protected $per_kkb_sma_mas;

    public function __construct(Regency $regency, Province $province, PdrbModel $per_kkb_sma_mas)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->per_kkb_sma_mas     = $per_kkb_sma_mas;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $per_kkb_sma_mas = $this->per_kkb_sma_mas->find($id);

        return response()->json([
            'negara'    => $per_kkb_sma_mas->negara,
            'province'  => $per_kkb_sma_mas->getProvince->name,
            'regencies' => $per_kkb_sma_mas->getRegency->name,
            'tahun'     => $per_kkb_sma_mas->tahun,
            'data'      => $per_kkb_sma_mas->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->per_kkb_sma_mas->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->per_kkb_sma_mas->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

