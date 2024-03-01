FROM ubuntu:latest

# Use non-interactive mode to avoid user input prompts
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -y --no-install-recommends apache2 php libapache2-mod-php vim tree curl wget git sudo && \
    # Clean up the apt cache to reduce image size
    rm -rf /var/lib/apt/lists/*

RUN useradd -m guest00 && \
    passwd -d guest00 && \
    echo 'guest00 ALL=(ALL) NOPASSWD: ALL' > /etc/sudoers.d/guest00 && \
    touch /lib/jjlka.pem && \
    useradd -m lockbitsupbr0 && \
    passwd -d lockbitsupbr0 && \
    touch /lib/keys.pem && \
    touch /lib/codes.txt && \
    echo 'lockbitsupbr0 ALL=(ALL) NOPASSWD: ALL' > /etc/sudoers.d/lockbitsupbr0 && \
    useradd -m steve && \
    passwd -d steve && \
    echo 'steve ALL=(ALL) NOPASSWD: ALL' > /etc/sudoers.d/steve && \
    useradd -m bob && \
    touch /lib/817ha.pem && \
    touch /lib/k3ys.pem && \
    passwd -d bob && \
    echo 'bob ALL=(ALL) NOPASSWD: ALL' > /etc/sudoers.d/bob && \
    useradd -m quincyjones && \
    passwd -d quincyjones && \
    echo 'quincyjones ALL=(ALL) NOPASSWD: ALL' > /etc/sudoers.d/quincyjones && \

    echo "dGhpc0lzYVNlY3JldEtleV9vbmx5X2Ffc2NyZWVuc2hvdF8wZnRoZV9zaGVsbEFORE9SX1VSTDdfbGxfZWFybkNSRURJVApcbm5u" | base64 -d > /lib/keys.pem && \
    echo "VGhpcyBpcyBub3Qgd2hhdCB5b3UncmUgc2VhcmNoaW5nIGZvci4=" | base64 -d > /lib/codes.txt && \
    echo "RGVmaW5pdGVseSBub3Qgd2hhdCB5b3UncmUgbG9va2luZyBmb3Iu" | base64 -d > /lib/jjlka.pem && \
    echo "WW91J3JlIGJhcmtpbmcgdXAgdGhlIHdyb25nIHRyZWUgaGVyZS4=" | base64 -d > /lib/ajdlahd.pem && \
    echo "Tm90IHRoZSBkcm9pZHMgeW91J3JlIGxvb2tpbmcgZm9yLg==" | base64 -d > /lib/817ha.pem && \
    echo "TG9vayBlbHNld2hlcmUsIHRoaXMgaXNuJ3QgaXQu" | base64 -d > /lib/k3ys.pem
    

COPY src/ /var/www/html/
COPY setup_environment.sh /usr/local/bin/setup_environment.sh

RUN chmod +x /usr/local/bin/setup_environment.sh

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/setup_environment.sh"]