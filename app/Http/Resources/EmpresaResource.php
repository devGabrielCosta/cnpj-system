<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $return = [
            'cnpj' => $this->cnpj,
            'nome' => $this->razao_social,
            'descricao' => $this->cnae_fiscal_descricao,
            'data_abertura' => $this->data_inicio_atividade,
            'data_ultima_atualizacao' => $this->data_situacao_cadastral,
            'endereco' => [
                'descricao_logradouro' => $this->descricao_tipo_logradouro,
                'logradouro' => $this->logradouro,
                'numero ' => $this->numero,
                'complemento' => $this->complemento,
                'bairro' => $this->bairro,
                'cep' => $this->cep,
                'uf' => $this->uf,
            ],
            'telefone' => $this->ddd_telefone_1,
            'telefone_secundario' => $this->ddd_telefone_2,
            'atividades' => $this->cnaes_secundarias,
        ];

        if($this->qsa){
            $return['socios'] = SocioResource::collection($this->qsa);
        }
        else{
            $return['socios'] = [];
        }

        return $return;
    }
}
