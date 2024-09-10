
<div>
    @if ($post->has_liked)
        <svg  data-like='like' data-user-id="{{ $user->id ?? 0}}" data-post-id="{{$post->id}}" id='like-button' xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z" /></svg>
    @else
        <svg  data-like='unlike' data-user-id="{{ $user->id ?? 0}}" data-post-id="{{$post->id}}" id='like-button' xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>    
    @endif
    {{count($post->likes)}}
</div>


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const likeButtons = document.querySelectorAll('#like-button');

            likeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const user_id = button.getAttribute('data-user-id');
                    const post_id = button.getAttribute('data-post-id');
                    
                    // Realiza la solicitud POST
                    fetch('{{ route('like') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                "X-CSRF-Token": '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                user_id: user_id,
                                post_id: post_id
                            })
                        })
                        .then(response => {
                            if (response.ok) {
                                return response.json();
                            } else {
                                throw new Error('Network response was not ok.');
                            }
                        })
                        .then(data => {
                            console.log('Success:', data);
                            // Puedes agregar lógica para cambiar el botón a "Unfollow" si es necesario
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });

                });
            });
        });
    </script>
@endpush