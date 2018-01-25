---
layout:     post
title:      Proof of Work Security at Scale: Equihash Goals Revisited
date:       2016-02-02 2:23:00
summary:    Zcash team PoW security goals examined. ASIC resistance feasibility
categories: 
---

### Proof of Work Security at Scale: Equihash Goals Revisited

[Zcash](https://z.cash/) is a decentralized and open-source cryptocurrency that
offers [privacy](https://z.cash/blog/zcash-private-transactions.html) and
selective transparency of
[transactions](https://z.cash/blog/anatomy-of-zcash.html). Zcash payments are
published on a public blockchain, but the sender, recipient, and amount of a
transaction are visible only to the participants involved in the transaction.
This level of privacy is made possible by the use of a new cryptographic
technique, the [zero-knowledge
proof](https://blog.cryptographyengineering.com/2014/11/27/zero-knowledge-proofs-illustrated-primer/).
The zero-knowledge proof enables one party to prove to another party that a
given statement is true, without conveying any information apart from the fact
that the statement is indeed true. This technique is used in Zcash to validate
[shielded transactions](https://z.cash/blog/zcash-private-transactions.html),
guaranteeing a very high level of privacy. However, signing these private
transactions is currently very computationally expensive and their[ real world
use](https://explorer.zcha.in/statistics/timeseries?trnstx=true&supply=false&hashrate=false)
is limited.

The Zcash cryptocurrency uses a unique approach to mining.
[ASIC](https://en.bitcoin.it/wiki/ASIC) (Application Specific Integrated Circuit
resistance has long been a desirable goal for mining algorithms, however, many
suggest that [the effort is
futile](https://download.wpsoftware.net/bitcoin/asic-faq.pdf). The Zcash team’s
stated goals are increased accessibility and ASIC resistance. They argue ASIC
resistance is a worthwhile pursuit as it [“makes the network more accessible to
“small” miners who are extremely valuable for providing a market balance to
other miners with significantly more
capabilities.”](https://z.cash/blog/slow-start-and-mining-ecosystem.html)
[Equihash](https://www.internetsociety.org/sites/default/files/blogs-media/equihash-asymmetric-proof-of-work-based-generalized-birthday-problem.pdf),
the [mining algorithm](https://z.cash/blog/why-equihash.html) chosen for Zcash,
attempts to limit the cost-effectiveness of building ASICs through memory
hardness, which requires a large amount of memory to generate a proof. The
[mining performance](https://z.cash/blog/why-equihash.html) is thought to be
mostly determined by the amount of RAM .  If ASIC resistance is possible to some
degree, it may increase the level of decentralization of the network.

I will examine whether Equihash has accomplished the
[original](https://forum.z.cash/t/speculative-mining-discussion/579/7)
[stated](https://z.cash/blog/why-equihash.html) goals by examining:

1.  If Equihash is in fact memory hard
1.  If ASIC resistance is possible through memory hardness

I will also explore how PoW algorithms best optimize security at scale and why
Bitcoin embraces ASICs rather than resists.

### Original Goals Examined

#### #1

Memory hardness is a computationally-hard problem, which requires a great deal
of memory to generate a proof. It is generally achieved by requiring a
significant amount of memory per miner instance and holding this memory until a
solution is found. Equihash, unlike many other memory hard algorithms, is
efficient to verify. The time and memory parameters are able to be manipulated,
however, once set at the genesis block, a hard fork is required to change them.
Hard forks require the majority of hashpower to switch to the new chain, so
adjusting the parameters is unlikely. The initial goals made by the Zcash team
of accessibility and resistance accomplished by [mining
performance](https://z.cash/blog/why-equihash.html) determined by amount of RAM,
has since[ been proved mostly
untrue](http://www.openwall.com/articles/Zcash-Equihash-Analysis). Mining
performance is limited partially by memory, but the amount of memory utilizable
is limited by how much parallelism the hardware can exploit. This property has
made casual mining largely unprofitable for [average
users](https://forum.z.cash/t/speculative-mining-discussion/579/7). The standard
users computer is not able to compete with specialized GPU mining hardware. Most
standard computers are not able exploit enough parallelism with one CPU to
utilize the memory and memory bandwidth potential. The stated advantage (2–4
times) of GPUs over CPUs in the Equihash paper in practice has been much larger
(9–10 times). This [problem is
exacerbated](https://twitter.com/mwilcox/status/872560076917153792) by the many
other cryptocurrencies with hashing algorithms optimal for GPU based hardware.
Without doubt Equihash has accomplished its goal of memory hardness but fails to
reduce the efficiency gap between GPUs and CPUs enough to make mining profitable
for casual users.

#### #2

The Equihash aims for memory hardness because memory “is a very expensive
resource in terms of area and the amortized chip cost, ASICs would be only
slightly more efficient.” While this is true for consumer type RAM, [commodity
RAM is cost effective to be
utilized](http://www.openwall.com/articles/Zcash-Equihash-Analysis) for specific
functions at large production volume. Further, [custom RAM
architectures](http://www.openwall.com/articles/Zcash-Equihash-Analysis)
designed will be produced eventually with sufficient demand. So while Equihash
may be desirable on a temporary basis for ASIC resistance and reducing the
efficiency gap between GPUs and CPUs, in the long term this trait has the
opposite intended effect. When the network is large enough and an ASIC is
[inevitably designed](https://en.wikipedia.org/wiki/Economies_of_scale), the
capital mining cost relative to energy cost will be very high. This discourages
smaller miners from joining the network.

In addition, memory hardness increases the ASIC board foot print, removing the
[physical incentive for
decentralization](https://download.wpsoftware.net/bitcoin/asic-faq.pdf). Memory
hardness is not desirable when designing a decentralized currency resistant in
the longterm. Therefore Equihash will not accomplish its stated goal of ASIC
resistance through memory hardness.

#### Optimal PoW Design  at Scale

Proof of Work algorithms best optimize security by incentivising
decentralization. Decentralization is desirable as it provides censorship
resistance and eliminates single points of failure. The only way to effectively
incentivise decentralization is to choose an algorithm with properties that
embrace the economics of scale. While ASIC resistance may seem an optimal
strategy to prevent specialized hardware design from gaining a disproportionate
advantage over small actors, it is impossible to create an algorithm that runs
at the same speed on general-purpose and dedicated hardware. So, resistance to
dedicated specialized hardware for mining (ASICs) is only possible on a
temporary basis.

Assume instead, that ASICs will eventually be developed. A mining algorithm that
requires no state, is completely parallelizable, and is progress free is optimal
for decentralization. This means that a miners return on investment must be
directly proportional to their computing power. It minimizes the minimum upfront
cost required to participate and provides incentive for miners of a wide range
of computational  power. The requirement of no state and complete
parallelizability effectively mean that there is no distinction between devoting
more time to mining or devoting more computational power to mining. In addition,
the algorithm must be progress free. This prevents older miners on the network
from gaining a disproportionate advantage. It also allows miners to join and
leave the network at no cost, allowing new miners to join the network and
equally benefit from participating.

Proof of work algorithms best optimize security by utilizing an algorithm with
properties that incentivise ASIC development to push towards the thermodynamic
limit for efficiency. Using a proof-of-work based on finding partial hash
preimages, which requires no state and is completely parallelizable, is what
Bitcoin uses to physically incentivise decentralization. Because heat
dissipation is proportional to hashing speed (mining performance) centralization
of mining is discouraged. [It is more efficient for two physically-separated
actors to dissipate heat than for just
one.](https://download.wpsoftware.net/bitcoin/asic-faq.pdf) This incentivises
more actors to dissipate heat making centralization an inefficiency.

### Conclusion

Proof of work only can only provide security on a large scale by embracing the
inevitable development of ASICs. Bitcoin utilizes a PoW algorithm where the
thermodynamic limit acts as physical incentive for decentralization.
Cryptocurrencies such as Zcash use PoW algorithms, such as Equihash, that pursue
ASIC resistance to maximize security through decentralization are not adequate
at scale. Equihash is memory hard, which does prevent ASIC development
temporarily, however, if the network becomes sufficiently valuable, this
property will have a centralizing effect on mining and decrease security. The
best way to maximize security at scale through decentralization is by emulating
the properties of Bitcoin.

<br>

<br>
