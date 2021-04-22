<table>
    <thead>
        <tr>
            <th style="background-color: yellow;" width="5">N</th>
            <th style="background-color: yellow;" width="20">шартнома раками</th>
            <th style="background-color: yellow;" width="20">шартнома санаси</th>
            <th style="background-color: yellow;" width="20">Ф.И.Ш</th>
            <th style="background-color: yellow;" width="20">Тел раками</th>
            <th style="background-color: yellow;" width="20">Компания тулови</th>
            <th style="background-color: yellow;" width="20">Институт</th>
            <th style="background-color: yellow;" width="20">Мутахассислиги</th>
            <th style="background-color: yellow;" width="20">Ўқиш тури</th>
            <th style="background-color: yellow;" width="20">Таржимага берилди</th>
            <th style="background-color: yellow;" width="20">Таржима килинди</th>
            <th style="background-color: yellow;" width="20">Филиал</th>
            <th style="background-color: yellow;" width="20">Менеджер</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach($students as $student)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $student->sh_number }}</td>
                <td>{{ date('m/d/Y', strtotime($student->service_date)) }}</td>
                <td>{{ $student->full_name }}</td>
                <td>{{ $student->phone }}</td>
                <td>
                    @if(isset($student->service_amount))
                        {{ $student->service_amount }}
                    @endif
                </td>
                <td>
                    @if(isset($student->speciality->faculty->university->name))
                        {{ $student->speciality->faculty->university->name }}
                    @endif
                </td>
                <td>
                    @if(isset($student->speciality->name))
                        {{ $student->speciality->name }}
                    @endif
                </td>
                <td>{{ $student->type_n }}</td>
                <td>@if($student->service_contract_check)переводга берилди @endif</td>
                <td>@if($student->perevod_status) перевод булди @endif</td>
                <td>
                    @if(isset($student->manager->boss_manager->filial))
                        {{ $student->manager->boss_manager->filial->number }}
                    @endif
                </td>
                <td>
                    @if(isset($student->manager->name))
                        {{ $student->manager->name }}
                    @endif
                </td>
            </tr>
            @php $i++; @endphp
        @endforeach
    </tbody>
</table>