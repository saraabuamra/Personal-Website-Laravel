<h2>السلام عليكم , معك  {{$contact->name}}</h2>
</br>

<strong>تفاصيل المستخدم: </strong><br/>
<strong>الاسم: </strong>{{$contact->name}}<br/>
<strong>البريد الإلكتروني: </strong>{{$contact->email}}<br/>
<strong>الجنس: </strong>@if($contact->gender == 'M') ذكر @else أنثى @endif<br/>
<strong>رقم الجوال: </strong>{{$contact->mobile}}<br/>
<strong>موضوع الرسالة: </strong>{{$contact->subject}}<br/>
<strong>الرسالة: </strong>{{$contact->message}}<br/><br/>

شكرا لك