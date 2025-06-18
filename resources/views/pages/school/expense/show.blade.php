@extends('layouts.master')
@section('page')

<style>
      h1 {
        text-align: center;
        font-size: 25px;
        color: #2e8b57;
        margin-bottom: 40px;
     }
</style>


<div class="divbi">
        <a class="buttonbi" href="{{ url('classes') }}">
                <span> Expense List</span>
        </a>
  <button onclick="window.print()" class="buttonbis"><span> Print Page </span></button>
</div>
<div style="display: flex; align-items: center; justify-content: center;">
    <div>
     <h1>{{$expenses->classe->name}}</h1>
     <h3 style="margin-top:-30px;"> Expensive Enformation</h3>
   </div>
</div>

<table>
    <tr>
        <th>Id</th>
        <th>Type Name</th>
        <th>Fee</th>
        <th>Frequency</th>
        <th>Description</th>
        
    </tr>

    @foreach($frequences as $frequence)
    <tr>
        <td>{{ $frequence->id }}</td>
        <td>{{ $frequence->typeName }}</td>
        <td>
            @switch(strtolower($frequence->id))
                @case(1)
                    {{ $expenses->admission_fee ?? '0.00' }}
                    @break
                @case(2)
                    {{ $expenses->monthly_fee ?? '0.00' }}
                    @break
                @case(3)
                {{ $expenses->uniform_fee ?? '0.00' }}
                @break
               
                @case(4)
                    {{ $expenses->books_fee ?? '0.00' }}
                    @break
                @case(5)
                    {{ $expenses->exam_fee ?? '0.00' }}
                    @break
                @case(6)
                {{ $expenses->library_fee ?? '0.00' }}
                @break
                
                @case(7)
                    {{ $expenses->lab_fee ?? '0.00' }}
                    @break

               
                @case(8)
                    {{ $expenses->id_card_fee ?? '0.00' }}
                    @break
                @case(8)
                    {{ $expenses->report_card_fee ?? '0.00' }}
                    @break
                @case(9)
                    {{ $expenses->development_fee ?? '0.00' }}
                    @break
                
                @case(10)
                    {{ $expenses->art_craft_fee ?? '0.00' }}
                    @break
                    @case(11)
                    {{ $expenses->report_card_fee ?? '0.00' }}
                    @break
                    @case(12)
                    {{ $expenses->sports_fee ?? '0.00' }}
                    @break
                @default
                    N/A
            @endswitch
        </td>
        <td>{{ $frequence->frequency }}</td>
        <td>{{ $frequence->description }}</td>
       
    </tr>
    @endforeach


            <?php
                $total = 0;
                if ($expenses) {
                    $total += $expenses->admission_fee ?? 0;
                    $total += $expenses->monthly_fee*12?? 0;
                    $total += $expenses->uniform_fee ?? 0;
                    $total += $expenses->books_fee ?? 0;
                    $total += $expenses->exam_fee*3 ?? 0;
                    $total += $expenses->library_fee*12 ?? 0;
                    $total += $expenses->lab_fee*12 ?? 0;
                    $total += $expenses->id_card_fee ?? 0;
                    $total += $expenses->report_card_fee ?? 0;
                    $total += $expenses->development_fee ?? 0;
                    $total += $expenses->art_craft_fee*12 ?? 0;
                    $total += $expenses->sports_fee*12 ?? 0;
                }

        ?>

    <tr>
    <td colspan="4"><strong>Total Cost (Include 12 Month and 3 Exams fee)</strong></td>
    <td><strong>৳  {{ number_format($total, 2) }} (<i class="bi bi-plus-slash-minus"></i>)</strong></td>
    
    
   </tr>
</table>






@endsection
