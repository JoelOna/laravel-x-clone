<div>
    <button id="follow-button" data-user-id="{{ $user->id ?? 0}}" data-follower-id="{{ $isPost ? $post->user->id : $near_user->id }}">
        Follow
    </button>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const followButtons = document.querySelectorAll('#follow-button');

            followButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const user_id = button.getAttribute('data-user-id');
                    const follower_id = button.getAttribute('data-follower-id');
                    
                    // Realiza la solicitud POST
                    fetch('{{ route('follow') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                "X-CSRF-Token": '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                user_id: user_id,
                                follower_id: follower_id
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

