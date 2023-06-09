PGDMP          &                {            externo2    14.3    14.3                 0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    24833    externo2    DATABASE     d   CREATE DATABASE externo2 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE externo2;
                postgres    false            �            1259    24858 	   candidato    TABLE     �   CREATE TABLE public.candidato (
    id_candidato integer NOT NULL,
    nom_candidato character varying NOT NULL,
    comuna bigint NOT NULL
);
    DROP TABLE public.candidato;
       public         heap    postgres    false            �            1259    24857    candidato_id_candidato_seq    SEQUENCE     �   CREATE SEQUENCE public.candidato_id_candidato_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.candidato_id_candidato_seq;
       public          postgres    false    214                       0    0    candidato_id_candidato_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.candidato_id_candidato_seq OWNED BY public.candidato.id_candidato;
          public          postgres    false    213            �            1259    24844    comuna    TABLE     �   CREATE TABLE public.comuna (
    id_comuna integer NOT NULL,
    nom_comuna character varying NOT NULL,
    region bigint NOT NULL
);
    DROP TABLE public.comuna;
       public         heap    postgres    false            �            1259    24843    comuna_id_comuna_seq    SEQUENCE     �   CREATE SEQUENCE public.comuna_id_comuna_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.comuna_id_comuna_seq;
       public          postgres    false    212                       0    0    comuna_id_comuna_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.comuna_id_comuna_seq OWNED BY public.comuna.id_comuna;
          public          postgres    false    211            �            1259    24835    region    TABLE     j   CREATE TABLE public.region (
    id_region integer NOT NULL,
    nom_region character varying NOT NULL
);
    DROP TABLE public.region;
       public         heap    postgres    false            �            1259    24834    region_id_region_seq    SEQUENCE     �   CREATE SEQUENCE public.region_id_region_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.region_id_region_seq;
       public          postgres    false    210                       0    0    region_id_region_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.region_id_region_seq OWNED BY public.region.id_region;
          public          postgres    false    209            �            1259    24871    votante    TABLE     5  CREATE TABLE public.votante (
    rut character varying NOT NULL,
    nombre character varying NOT NULL,
    alias character varying NOT NULL,
    email character varying NOT NULL,
    region bigint NOT NULL,
    comuna bigint NOT NULL,
    candidato bigint NOT NULL,
    recomendaciones character varying
);
    DROP TABLE public.votante;
       public         heap    postgres    false            l           2604    24861    candidato id_candidato    DEFAULT     �   ALTER TABLE ONLY public.candidato ALTER COLUMN id_candidato SET DEFAULT nextval('public.candidato_id_candidato_seq'::regclass);
 E   ALTER TABLE public.candidato ALTER COLUMN id_candidato DROP DEFAULT;
       public          postgres    false    214    213    214            k           2604    24847    comuna id_comuna    DEFAULT     t   ALTER TABLE ONLY public.comuna ALTER COLUMN id_comuna SET DEFAULT nextval('public.comuna_id_comuna_seq'::regclass);
 ?   ALTER TABLE public.comuna ALTER COLUMN id_comuna DROP DEFAULT;
       public          postgres    false    212    211    212            j           2604    24838    region id_region    DEFAULT     t   ALTER TABLE ONLY public.region ALTER COLUMN id_region SET DEFAULT nextval('public.region_id_region_seq'::regclass);
 ?   ALTER TABLE public.region ALTER COLUMN id_region DROP DEFAULT;
       public          postgres    false    209    210    210                      0    24858 	   candidato 
   TABLE DATA           H   COPY public.candidato (id_candidato, nom_candidato, comuna) FROM stdin;
    public          postgres    false    214   W#       	          0    24844    comuna 
   TABLE DATA           ?   COPY public.comuna (id_comuna, nom_comuna, region) FROM stdin;
    public          postgres    false    212   �#                 0    24835    region 
   TABLE DATA           7   COPY public.region (id_region, nom_region) FROM stdin;
    public          postgres    false    210   �#                 0    24871    votante 
   TABLE DATA           h   COPY public.votante (rut, nombre, alias, email, region, comuna, candidato, recomendaciones) FROM stdin;
    public          postgres    false    215   �$                  0    0    candidato_id_candidato_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.candidato_id_candidato_seq', 2, true);
          public          postgres    false    213                       0    0    comuna_id_comuna_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.comuna_id_comuna_seq', 4, true);
          public          postgres    false    211                       0    0    region_id_region_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.region_id_region_seq', 16, true);
          public          postgres    false    209            r           2606    24865    candidato candidato_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.candidato
    ADD CONSTRAINT candidato_pkey PRIMARY KEY (id_candidato);
 B   ALTER TABLE ONLY public.candidato DROP CONSTRAINT candidato_pkey;
       public            postgres    false    214            p           2606    24851    comuna comuna_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.comuna
    ADD CONSTRAINT comuna_pkey PRIMARY KEY (id_comuna);
 <   ALTER TABLE ONLY public.comuna DROP CONSTRAINT comuna_pkey;
       public            postgres    false    212            n           2606    24842    region region_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.region
    ADD CONSTRAINT region_pkey PRIMARY KEY (id_region);
 <   ALTER TABLE ONLY public.region DROP CONSTRAINT region_pkey;
       public            postgres    false    210            t           2606    24879    votante votante_alias_key 
   CONSTRAINT     U   ALTER TABLE ONLY public.votante
    ADD CONSTRAINT votante_alias_key UNIQUE (alias);
 C   ALTER TABLE ONLY public.votante DROP CONSTRAINT votante_alias_key;
       public            postgres    false    215            v           2606    24877    votante votante_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.votante
    ADD CONSTRAINT votante_pkey PRIMARY KEY (rut);
 >   ALTER TABLE ONLY public.votante DROP CONSTRAINT votante_pkey;
       public            postgres    false    215            x           2606    24881    votante votante_rut_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.votante
    ADD CONSTRAINT votante_rut_key UNIQUE (rut);
 A   ALTER TABLE ONLY public.votante DROP CONSTRAINT votante_rut_key;
       public            postgres    false    215            z           2606    24866    candidato candidato_comuna_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.candidato
    ADD CONSTRAINT candidato_comuna_fkey FOREIGN KEY (comuna) REFERENCES public.comuna(id_comuna);
 I   ALTER TABLE ONLY public.candidato DROP CONSTRAINT candidato_comuna_fkey;
       public          postgres    false    3184    212    214            y           2606    24852    comuna comuna_region_fkey    FK CONSTRAINT        ALTER TABLE ONLY public.comuna
    ADD CONSTRAINT comuna_region_fkey FOREIGN KEY (region) REFERENCES public.region(id_region);
 C   ALTER TABLE ONLY public.comuna DROP CONSTRAINT comuna_region_fkey;
       public          postgres    false    3182    210    212               F   x�3�tO-J,J�Wp�I+JҮ������$*�g%srq:�V(8'�d���+8� ���b���� ���      	   <   x�3�t,�LN�4�2�tN�M,��K-�9�S�R�s|��A"&��%E�@V� �*         �   x��;�0��S��44A ��h^�`�d��v
��8#����!�ġzVG$�pZ�:#����yJ6��#fF�����V���]��!YyI��$�4HA���%f^�}hٌ���ڈ6�l&T��	�C��R��:�f6�?��1'��md�r! ���#f���?�         r   x�3��4351��5�L�LM�W(�,.�/·�,- tfY���Cznbf�^r~.�!��&鄄qZ����r�'&U�	Cs#\Z���(5%�8�8?931'�X'173=�+F��� Iv+     