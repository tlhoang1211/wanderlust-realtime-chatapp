<tr>
    <td class="header">
        <a href="http://127.0.0.1:8000/login" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img
                    src="https://res.cloudinary.com/vernom/image/upload/v1639377635/realtime_chat_app/page_bg/output-onlinegiftools_dyrqhz.gif"
                    class="logo" alt="Wanderlust Realtime Chat App Logo">
                <h2 style="font-weight: 400; color: aqua">WANDERLUST</h2>
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
